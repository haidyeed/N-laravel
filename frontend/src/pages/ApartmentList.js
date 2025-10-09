import { useEffect, useState } from 'react';
import axios from 'axios';
import SearchApartments from './SearchApartments';
import ApartmentTable from './ApartmentTable';
import { useNavigate } from 'react-router-dom';

function ApartmentList() {
  const [apartments, setApartments] = useState([]);
  const [searchQuery, setSearchQuery] = useState('');
  const [currentPage, setCurrentPage] = useState(1);
  const [lastPage, setLastPage] = useState(1);
  const navigate = useNavigate();

  const fetchApartments = (page = 1, query = '') => {
    const url = query
        ? `http://0.0.0.0:8000/api/apartments/search/${query}?page=${page}`
        : `http://0.0.0.0:8000/api/apartments?page=${page}`;

    axios.get(url)
        .then(res => {
        const data = query ? res.data.data : res.data;

        // If data is null, set apartments to empty array
        if (!data || !data.data) {
            setApartments([]);
            setCurrentPage(1);
            setLastPage(1);
            return;
        }

        setApartments(data.data);
        setCurrentPage(data.current_page);
        setLastPage(data.last_page);
        })
        .catch(err => {
        console.error(err);
        setApartments([]);
        });
    };


  useEffect(() => {
    fetchApartments();
  }, []);

  const handleSearch = (e) => {
    e.preventDefault();
    fetchApartments(1, searchQuery);
  };

  const handlePageChange = (page) => {
    fetchApartments(page, searchQuery);
  };

  const handleDelete = (id) => {
    if (!window.confirm('Are you sure you want to delete this apartment?')) return;

    axios.delete(`http://0.0.0.0:8000/api/apartments/${id}`)
      .then(() => {
        setApartments(prev => prev.filter(apartment => apartment.id !== id));
      })
      .catch(err => console.error('Delete failed:', err));
  };

  return (
    <div className="container mt-5">
      <div className="d-flex justify-content-between align-items-center mb-4">
        <h2>Apartments Dashboard</h2>
        <button className="btn btn-success" onClick={() => navigate('/create')}>
            + Create New Apartment
        </button>
      </div>

      <SearchApartments
        searchQuery={searchQuery}
        setSearchQuery={setSearchQuery}
        onSearch={handleSearch}
      />
        {apartments.length === 0 && searchQuery ? (
        <div className="alert alert-warning text-center">
            No apartments found for “{searchQuery}”.
        </div>
        ) : (
        <ApartmentTable
            apartments={apartments}
            onDelete={handleDelete}
        />
        )}
      {/* Pagination stays here */}
      <nav>
        <ul className="pagination justify-content-center">
          {Array.from({ length: lastPage }, (_, i) => (
            <li key={i + 1} className={`page-item ${currentPage === i + 1 ? 'active' : ''}`}>
              <button className="page-link" onClick={() => handlePageChange(i + 1)}>
                {i + 1}
              </button>
            </li>
          ))}
        </ul>
      </nav>
    </div>
  );
}

export default ApartmentList;

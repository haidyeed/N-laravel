import { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import axios from 'axios';

function ApartmentDetail() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [apartment, setApartment] = useState(null);

  useEffect(() => {
    axios.get(`http://0.0.0.0:8000/api/apartments/${id}`)
      .then(res => setApartment(res.data))
      .catch(err => console.error('Failed to load apartment:', err));
  }, [id]);

  if (!apartment) return <div className="container mt-5">Loading...</div>;

  return (
    <div className="container mt-5">
      <h2>Apartment Details</h2>
      <div className="card p-4">
        <p><strong>Name:</strong> {apartment.unit_name}</p>
        <p><strong>Code:</strong> {apartment.unit_number}</p>
        <p><strong>Project:</strong> {apartment.project}</p>
        <p><strong>Floor:</strong> {apartment.floor}</p>
        <p><strong>Area:</strong> {apartment.area} m²</p>
        <p><strong>Price:</strong> ${apartment.price}</p>
        <p><strong>Description:</strong> {apartment.description}</p>
        <p><strong>Available:</strong> {apartment.is_available ? 'Yes' : 'No'}</p>
        <p><strong>Created At:</strong> {new Date(apartment.created_at).toLocaleString()}</p>
        <p><strong>Updated At:</strong> {new Date(apartment.updated_at).toLocaleString()}</p>
        <button className="btn btn-secondary mt-4" onClick={() => navigate('/')}>Back</button>
      </div>
    </div>
  );
}

export default ApartmentDetail;

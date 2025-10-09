import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';

function ApartmentForm() {
  const navigate = useNavigate();
  const [formData, setFormData] = useState({
    unit_name: '',
    unit_number: '',
    project: '',
    description: '',
    price: '',
    bedrooms: '',
    bathrooms: '',
    area: '',
    floor: '',
    is_available: false
  });

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    setFormData(prev => ({
      ...prev,
      [name]: type === 'checkbox' ? checked : value
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    axios.post('http://0.0.0.0:8000/api/apartments', formData)
        .then(() => {
        navigate('/', { replace: true }); // ✅ redirect to list
        })
        .catch(err => console.error('Create failed:', err));
    };


  return (
    <div className="container mt-5">
      <h2>Create New Apartment</h2>
      <form onSubmit={handleSubmit}>
        <input name="unit_name" value={formData.unit_name} onChange={handleChange} className="form-control mb-2" placeholder="Name" />
        <input name="unit_number" value={formData.unit_number} onChange={handleChange} className="form-control mb-2" placeholder="Code" />
        <input name="project" value={formData.project} onChange={handleChange} className="form-control mb-2" placeholder="Project" />
        <textarea name="description" value={formData.description} onChange={handleChange} className="form-control mb-2" placeholder="Description" />
        <input name="price" value={formData.price} onChange={handleChange} className="form-control mb-2" placeholder="Price" />
        <input name="bedrooms" value={formData.bedrooms} onChange={handleChange} className="form-control mb-2" placeholder="Bedrooms" />
        <input name="bathrooms" value={formData.bathrooms} onChange={handleChange} className="form-control mb-2" placeholder="Bathrooms" />
        <input name="area" value={formData.area} onChange={handleChange} className="form-control mb-2" placeholder="Area" />
        <input name="floor" value={formData.floor} onChange={handleChange} className="form-control mb-2" placeholder="Floor" />
        <div className="form-check mb-3">
          <input type="checkbox" name="is_available" checked={formData.is_available} onChange={handleChange} className="form-check-input" />
          <label className="form-check-label">Available</label>
        </div>
        <button className="btn btn-success">Create</button>
      </form>
    </div>
  );
}

export default ApartmentForm;

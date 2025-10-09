import { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import axios from 'axios';

function ApartmentEdit() {
  const [originalData, setOriginalData] = useState({});
  const { id } = useParams();
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

    useEffect(() => {
    axios.get(`http://0.0.0.0:8000/api/apartments/${id}`)
        .then(res => {
        setFormData(res.data);
        setOriginalData(res.data);
        })
        .catch(err => console.error('Failed to load apartment:', err));
    }, [id]);


  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    setFormData(prev => ({
      ...prev,
      [name]: type === 'checkbox' ? checked : value
    }));
  };

    const handleSubmit = (e) => {
        e.preventDefault();

        const updatedFields = {};
        Object.keys(formData).forEach(key => {
            if (formData[key] !== originalData[key]) {
            updatedFields[key] = formData[key];
            }
        });

        axios.put(`http://0.0.0.0:8000/api/apartments/${id}`, updatedFields)
            .then(() => navigate('/'))
            .catch(err => console.error('Update failed:', err));
    };


  return (
    <div className="container mt-5">
      <h2>Edit Apartment</h2>
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
        <button className="btn btn-success">Update</button>
      </form>
    </div>
  );
}

export default ApartmentEdit;

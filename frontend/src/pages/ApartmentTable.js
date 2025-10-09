import { useNavigate } from 'react-router-dom';

function ApartmentTable({ apartments, onDelete }) {
  const navigate = useNavigate();

  return (
    <table className="table table-bordered table-hover">
      <thead className="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Code</th>
          <th>Project</th>
          <th>Floor</th>
          <th>Area</th>
          <th>Price</th>
          <th>Description</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        {apartments.map(apartment => (
          <tr key={apartment.id}>
            <td>{apartment.id}</td>
            <td>{apartment.unit_name}</td>
            <td>{apartment.unit_number}</td>
            <td>{apartment.project}</td>
            <td>{apartment.floor}</td>
            <td>{apartment.area}</td>
            <td>{apartment.price}</td>
            <td>{apartment.description}</td>
            <td>{new Date(apartment.created_at).toLocaleDateString()}</td>
            <td>{new Date(apartment.updated_at).toLocaleDateString()}</td>
            <td>
                <button className="btn btn-sm btn-info me-2" onClick={() => navigate(`/view/${apartment.id}`)}> View </button>
              <button className="btn btn-sm btn-primary me-2" onClick={() => navigate(`/edit/${apartment.id}`)}>Edit</button>
              <button className="btn btn-sm btn-danger" onClick={() => onDelete(apartment.id)}>Delete</button>
            </td>
          </tr>
        ))}
      </tbody>
    </table>
  );
}

export default ApartmentTable;

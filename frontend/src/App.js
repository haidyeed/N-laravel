import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import ApartmentList from './pages/ApartmentList';
import ApartmentDetail from './pages/ApartmentDetail';
import ApartmentForm from './pages/ApartmentForm';
import ApartmentEdit from './pages/ApartmentEdit';
import SearchApartments from './pages/SearchApartments';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<ApartmentList />} />
        <Route path="/apartments/:id" element={<ApartmentDetail />} />
        <Route path="/create" element={<ApartmentForm />} />
        <Route path="/edit/:id" element={<ApartmentEdit />} />
        <Route path="/search/:query" element={<SearchApartments />} />
        <Route path="/view/:id" element={<ApartmentDetail />} />
        <Route path="/create" element={<ApartmentForm />} />
      </Routes>
    </Router>
  );
}

export default App;

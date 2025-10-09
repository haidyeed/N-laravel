function ApartmentSearchBar({ searchQuery, setSearchQuery, onSearch }) {
  return (
    <form className="mb-4 d-flex" onSubmit={onSearch}>
      <input
        type="text"
        className="form-control me-2"
        placeholder="Search apartments..."
        value={searchQuery}
        onChange={(e) => setSearchQuery(e.target.value)}
      />
      <button className="btn btn-primary" type="submit">Search</button>
    </form>
  );
}

export default ApartmentSearchBar;

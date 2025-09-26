<div>
    <label>Name:</label>
    <input type="text" name="unit_name" value="{{ old('unit_name', $apartment->unit_name ?? '') }}">
</div>

<div>
    <label>Unit Number:</label>
    <input type="text" name="unit_number" value="{{ old('unit_number', $apartment->unit_number ?? '') }}">
</div>

<div>
    <label>Project:</label>
    <input type="text" name="project" value="{{ old('project', $apartment->project ?? '') }}">
</div>

<div>
    <label>Price:</label>
    <input type="number" name="price" step="0.01" value="{{ old('price', $apartment->price ?? '') }}">
</div>

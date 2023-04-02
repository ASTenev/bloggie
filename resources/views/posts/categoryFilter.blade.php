<form action="{{ route('posts.index') }}" method="GET" id="search-by-category-form">
    <div class="form-group">
        <label for="category_id">Filter by category:</label>
        @include('posts.categorySelect')
    </div>
    <button type="submit" class="btn btn-primary" style="display:none;">Search</button>
</form>

<script>
    const categoryDropdown = document.getElementById('category_id');
    categoryDropdown.addEventListener('change', function() {
        const categoryId = categoryDropdown.value;
        let formAction = "{{ route('posts.index') }}";
        if (categoryId) {
            formAction += "/categories/" + categoryId;
        }
        window.location.href = formAction;
    });
</script>

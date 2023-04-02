<select name="category_id" id="category_id" class="form-control">
    <option value="">-- Select Category --</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ (isset($post->category_id) && $category->id == $post->category_id) ? 'selected' : '' }}
        >{{ $category->name }}</option>
    @endforeach
</select>

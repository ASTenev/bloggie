<select name="category_id" id="category_id" class="form-control">
    <option value="">-- Select Category --</option>
    @php
        if(isset($post)){
            $selected = $post->category_id;
        }
    @endphp
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ (isset($selected) && $category->id == $selected) ? 'selected' : '' }}
        >{{ $category->name }}</option>
    @endforeach
</select>

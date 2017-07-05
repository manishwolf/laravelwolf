<h2><a href="{{ url('/') }}/home">Dashboard</a> &raquo; <a href="{{ url('/') }}/editbook/{{ $itemID }}" class="active">Edit book</a></h2>
<div id="main">
	<form action="" class="jNice" name="bookeditform" id="bookeditform" method="post">
	<h3>Book edit section</h3>
		<fieldset>
			<p><label>Book Name</label><input type="text" class="text-long" name="bookName" id="bookName" value="{{ $editBookData->bookName }}"></p>
			<p class="form__error"></p>
			<p><label>Category:</label>
			<select  id="category" name="category">
				<option value="" >Select</option>
				<option  selected ="@if ( $editBookData->category  == 'education') 'selected' @else '' @endif" value="education">Education</option>
				<option selected ="@if ( $editBookData->category  == 'health') 'selected' @else '' @endif" value="health">Health</option>
				<option selected ="@if ( $editBookData->category  == 'research') 'selected' @else '' @endif" value="research">Research</option>
			</select>
			</p>
			<p id="categoryErr" style="text-align: left; margin-top: -13px;font-size: .8rem;color: #c0392b;"></p>
			<p><label>Publisher Name</label><input type="text" class="text-long" name="publishBy" id="publishBy" value="{{ $editBookData->publishBy }}">
			<p class="form__error"></p>
			<p><label>Description:</label><textarea rows="1" cols="1" name="desc" id="desc">{{ $editBookData->desc }}</textarea></p>
			<p class="form__error"></p>
			<input type="submit" id="editBook" value="Edit Book" />
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
		</fieldset>
	</form>
</div>

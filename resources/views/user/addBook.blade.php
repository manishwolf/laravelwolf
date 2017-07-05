<h2><a href="{{ url('/') }}/home">Dashboard</a> &raquo; <a href="{{ url('/') }}/addbook" class="active">Add book</a></h2>
<div id="main">
	<form action="" class="jNice" name="bookform" id="bookform" method="post">
	<h3>Book add section</h3>
		<fieldset>
			<p><label>Book Name</label><input type="text" class="text-long" name="bookName" id="bookName" value=""></p>
			<p class="form__error"></p>
			<p><label>Category:</label>
			<select  id="category" name="category">
				<option value="" >Select</option>
				<option value="education">Education</option>
				<option value="health">Health</option>
				<option value="research">Research</option>
			</select>
			</p>
			<p id="categoryErr" style="text-align: left; margin-top: -13px;font-size: .8rem;color: #c0392b;"></p>
			<p><label>Publisher Name</label><input type="text" class="text-long" name="publishBy" id="publishBy" value="">
			<p class="form__error"></p>
			<p><label>Description:</label><textarea rows="1" cols="1" name="desc" id="desc"></textarea></p>
			<p class="form__error"></p>
			<input type="submit" id="addBook" value="Add Book" />
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
		</fieldset>
	</form>
</div>

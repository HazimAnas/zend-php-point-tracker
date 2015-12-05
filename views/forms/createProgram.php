<form method="POST" action="/actions/programActions.php">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="Description">Description</label>
    <textarea name="description" class="form-control" placeholder="Description"></textarea>
  </div>
  <input type="hidden" name="save" value="true" />
  <button type="submit" class="btn btn-success">Submit</button>
</form>
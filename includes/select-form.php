<form class="m-auto" style="width: 1000px;">
<div class="form-group">
    <label for="exampleFormControlSelect1">Select page</label>
    <select class="form-control" id="page-control">
      <option value="e">The Journey</option>
      <option value="e">Records</option>
      <option value="polaroids">Polaroids</option>
    </select>
  </div>

  <div class="form-group d-none" id="form-polaroids">
    <label for="">Team member</label>
    <select class="form-control">
      <option value="">--Please select a team member--</option>
      <option value="carlSagan">Carl Sagan</option>
      <option value="annDruyan">Ann Druyan</option>
      <option value="ewardCStone">Eward C Stone</option>
      <option value="jonLomberg">Jon Lamberg</option>
      <option value="frankDrake">Frank Drake</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Title</label>
    <input required class="form-control inputs" rows="3"/>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Text 1</label>
    <textarea required class="form-control inputs" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Text 2</label>
    <textarea required class="form-control inputs" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
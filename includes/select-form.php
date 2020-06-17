<form class="m-auto" style="width: 1000px;" id="form" method="POST" action="manager.php">
<div class="form-group">
    <label for="page">Select page</label>
    <select  name="page" class="form-control" id="page-control">
      <option value="the-journey">The Journey</option>
      <option value="record">Record</option>
      <option value="polaroids">Polaroids</option>
    </select>
  </div>
<!-- FORM POLAROID, INITAL STATE = DISPLAY NONE -->
  <div class="form-group d-none" id="form-polaroids">
    <label for="team-member">Team member</label>
    <select name="team-member" class="form-control">
      <option value="">--Please select a team member--</option>
      <option value="carlSagan">Carl Sagan</option>
      <option value="annDruyan">Ann Druyan</option>
      <option value="ewardCStone">Eward C Stone</option>
      <option value="jonLomberg">Jon Lamberg</option>
      <option value="frankDrake">Frank Drake</option>
    </select>
  </div>
  <!-------------------------------------------->
<!-- FORM RECORD, INITAL STATE = DISPLAY NONE -->
  <div class="form-group d-none" id="form-record">
    <label for="sign">Sign</label>
    <select name="sign" class="form-control">
      <option value="">--Please select a sign--</option>
      <option value="record">Radial Circle</option>
      <option value="elevation">Side View</option>
      <option value="pulsar">Pulsar Map</option>
      <option value="waves">The waves</option>
      <option value="frames">The images</option>
      <option value="hydrogen">Hydrogen Atoms</option>
    </select>
  </div>
  <!--------------------------- ----------------->

  <input type="text" readonly id="id" name="id" class="d-none" >
  <div id="form-title" class="d-none" class="form-group">
    <label for="title">Title</label>
    <input name="title"  class="form-control inputs" rows="3"/>
  </div>

  <div class="form-group">
    <label   for="text-1">Text 1</label>
    <textarea name="text-1"  class="form-control inputs" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="text-2">Text 2</label>
    <textarea name="text-2"  class="form-control inputs" rows="3"></textarea>
  </div>
   <!-- FORM THE JOURNEY, INITAL STATE = DISPLAY NONE -->
    <div class="form-group" id="form-the-journey">
    <label for="text-3">Text 3</label>
    <textarea name="text-3" class="form-control inputs" rows="3"></textarea>
  </div>
<!-------------------------------------------->
  <button type="submit" id="submit" name="the-journey" class="btn btn-primary">Submit</button>
</form>
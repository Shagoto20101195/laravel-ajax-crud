  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" method="POST" id="addStudent">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Add Student</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="errMsg">

                </div>


                <div class="form-group">
                    <label for="email">Enter Email:</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    <br>
                    <label for="name">Enter Name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_student">Add</button>
              </div>
            </div>
          </div>
    </form>
  </div>
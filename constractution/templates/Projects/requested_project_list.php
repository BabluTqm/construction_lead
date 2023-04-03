<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">All Projects Requested By You</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <?php echo $this->element('flash/project_index') ?>
                    <?php ?>
                     
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==============Modal for show assigned contractors============== -->
<!-- <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 670px;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">All Assigned Contractors</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Contractor Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                            </tr>
                        </thead>
                        <tbody>
                           <ul id="response">

                           </ul>
                            
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> -->
   
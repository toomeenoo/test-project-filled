<div class="container container-lg">
    <div class="row">
    <h1 class="m-4">PHP Test Application</h1>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Table of users</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>City</th>
                                <th>Phone number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach ($users as $user) { ?>
                                <tr>
                                    <td><?= $user->getName() ?></td>
                                    <td><?= $user->getEmail() ?></td>
                                    <td><?= $user->getCity() ?></td>
                                    <td><?= $user->getPhone() ?></td>
                                </tr>
                            <? } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add new user</h5>
                    <form method="post" action="create.php">
                        <div class="row mb-3">
                            <label for="name" class="col-sm-4 col-form-label">Name:</label>
                            <div class="col-sm-8"><input name="name" input="text" id="name" /></div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="email" class="col-sm-4 col-form-label">E-mail:</label>
                            <div class="col-sm-8"><input name="email" input="text" id="email" /></div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="city" class="col-sm-4 col-form-label">City:</label>
                            <div class="col-sm-8"><input name="city" input="text" id="city" /></div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="phone" class="col-sm-4 col-form-label">Phone number:</label>
                            <div class="col-sm-8"><input name="phone" input="text" id="phone" /></div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <button class="btn btn-primary">Create new row</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
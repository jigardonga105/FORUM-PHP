<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginmodalLabel">Login to <b><i><u>FORUM - Let's Discuss</u></i></b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/forum/partials/_handleLogin.php" method="post" >
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPass" name="loginPass" required>
                    </div>
                    <div id="emailHelp" class="form-text">
                        We'll never share your Username and Password with anyone else.
                    </div>
                    <br>
                    <button type="submit" class="btn btn-warning">Login</button>
                    <button type="reset" class="btn btn-warning" align="right">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
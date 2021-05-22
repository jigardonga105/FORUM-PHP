<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodalLabel">Signup for The <b><i><u>FORUM - Let's Discuss</u></i></b>
                    Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/forum/partials/_handleSignup.php" method="post" >
                <div class="modal-body">
                    <div>
                        Instructions:<ul>
                            <li>User can not Sign Up again with same Email Id</li>
                            <li>Type password and confirm password same</li>
                            <li>For your privacy use special characters in your password</li>
                        </ul>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">User Name</label>
                        <input type="text" maxlength="30" class="form-control" id="signupUsername" name="signupUsername" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword" required>
                    </div>
                    <button type="submit" class="btn btn-warning mr-3" align="left">Signup</button>
                    <button type="reset" class="btn btn-warning" align="right">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
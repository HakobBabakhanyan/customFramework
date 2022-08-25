<?php include __DIR__ . '/layouts/header.php'; ?>


    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <form method="post" action="/login" class="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Login</label>
                    <input type="text" name="login" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

<?php require_once __DIR__ . './layouts/footer.php'; ?>
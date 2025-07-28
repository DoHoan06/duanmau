<form action="<?= BASE_URL ?>?action=login" method="post">
  <div class="mb-3">
    <label for="Email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="Email" name="email">
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="password">
  </div>
  <a href="<?= BASE_URL ?>?action=register">Đăng ký</a> <br> <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
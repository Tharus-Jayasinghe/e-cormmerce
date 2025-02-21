<div class="d-flex flex-column align-items-center justify-content-center min-vh-100 bg-light text-dark">
  <!-- Header -->
  <!-- <div class="container-fluid text-center mb-4">
    <h2 class="h4 fw-bold">Dashboard</h2>
  </div> -->

  <!-- Statistics Section -->
  <section class="no-padding-top no-padding-bottom w-100">
    <div class="container-fluid">
      <div class="row g-4 justify-content-center">
        <!-- Total Clients -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block bg-gradient-primary text-white rounded shadow">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon fs-2"><i class="icon-user-1"></i></div>
                <strong class="fs-6">Total Clients</strong>
              </div>
              <div class="number dashtext-1 fs-3 fw-bold">{{$user}}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template bg-primary"></div>
            </div>
          </div>
        </div>

        <!-- Total Products -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block bg-gradient-success text-white rounded shadow">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon fs-2"><i class="icon-contract"></i></div>
                <strong class="fs-6">Total Products</strong>
              </div>
              <div class="number dashtext-2 fs-3 fw-bold">{{$product}}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template bg-success"></div>
            </div>
          </div>
        </div>

        <!-- Total Orders -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block bg-gradient-warning text-dark rounded shadow">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon fs-2"><i class="icon-paper-and-pencil"></i></div>
                <strong class="fs-6">Total Orders</strong>
              </div>
              <div class="number dashtext-3 fs-3 fw-bold">{{$order}}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template bg-warning"></div>
            </div>
          </div>
        </div>

        <!-- Total Deliveries -->
        <div class="col-md-3 col-sm-6">
          <div class="statistic-block block bg-gradient-danger text-white rounded shadow">
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="title">
                <div class="icon fs-2"><i class="icon-writing-whiteboard"></i></div>
                <strong class="fs-6">Total Deliveries</strong>
              </div>
              <div class="number dashtext-4 fs-3 fw-bold">{{$deliverd}}</div>
            </div>
            <div class="progress progress-template">
              <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template bg-danger"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer bg-dark text-white w-100 mt-auto py-2">
    <div class="container-fluid text-center">
      <p class="mb-0">
        &copy; <span id="displayYear"></span> 2024 All Rights Reserved By 
        <strong>LUXORA</strong>
      </p>
    </div>
  </footer>
</div>

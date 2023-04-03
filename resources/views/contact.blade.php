<x-app-layout>
  <div class="container-fluid mt-5">
    <div class="row justify-content-center">
      <div class="col-md-9 col-lg-6">
        <div class="row">
          <div class="container mx-auto py-8">
            <h1 class="text-4xl font-bold mb-8">Contact Us</h1>
            <div class="flex">
              <div class="w-1/2 mr-8">
                <form method="POST" action="{{ url('/contact') }}">
                  @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Send</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

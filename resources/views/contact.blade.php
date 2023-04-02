<x-app-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-6">
                <div class="row">


  <div class="container mx-auto py-8">
    <h1 class="text-4xl font-bold mb-8">Contact Us</h1>
    <div class="flex">
      <div class="w-1/2 mr-8">
        <h2 class="text-2xl font-bold mb-4">Send Us a Message</h2>
        <form action="" method="POST">
          @csrf
          <div class="mb-4">
            <label for="name" class="block font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" class="form-input w-full" required>
          </div>
          <div class="mb-4">
            <label for="email" class="block font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" class="form-input w-full" required>
          </div>
          <div class="mb-4">
            <label for="message" class="block font-bold mb-2">Message</label>
            <textarea name="message" id="message" rows="5" class="form-textarea w-full" required></textarea>
          </div>
          <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Send</button>
          </div>
        </form>
      </div>
      <div class="w-1/2">
        <h2 class="text-2xl font-bold mb-4">Get In Touch</h2>
        <p class="mb-4">If you have any questions, comments, or feedback, we'd love to hear from you! Please fill out the form on the left or use one of the methods below to get in touch with us:</p>
        <ul class="list-disc pl-8 mb-8">
          <li>Email: <a href="mailto:info@bloggie.com">info@bloggie.com</a></li>
          <li>Phone: 1-800-BLOGGIE</li>
          <li>Address: 123 Main St, Anytown USA</li>
        </ul>
        <p>We look forward to hearing from you!</p>
      </div>
    </div>
  </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

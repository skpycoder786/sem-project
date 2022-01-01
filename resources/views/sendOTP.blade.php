  <section class="p-5">
    <h1>Hello {{$body['name']}}</h1>
    <p>This is a system generated mail. You tried to get OTP to reset your password
    Your OTP: {{$body['otp']}}
    </p>
  </section>
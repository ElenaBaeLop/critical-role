<x-layout>
    <x-header />
    <section class= "wrapper">
        <h1 class="wrapper__title">Log In</h1>
        <form action="/login" method="POST" class="wrapper__form" id="register-form">
            <!--Crea un campo hidden con un token para este usuario-->
            @csrf
            <div class="wrapper__form__input">
                <label for="email" class="wrapper__form__input__label">EMAIL</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" required class="wrapper__form__input__input">
                @error('email')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="wrapper__form__input">
                <label for="password" class="wrapper__form__input__label">PASSWORD</label>
                <input type="password" name="password" id="password" required class="wrapper__form__input__input">
                @error('password')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="wrapper__form__buttons">
                <button type="submit" class="wrapper__form__buttons__button">Log In</button>
            </div>
        </form>
    </section>
</x-layout>

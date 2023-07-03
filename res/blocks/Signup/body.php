<div class="body">
    <div class="bInner">
        <form action="config/dbaccess" method='POST' class="biForm">
            <div class="bifHeader title-size w600">Registrieren</div>
            <div class="bifInputs">
                <input type="text" name='login' class="bifiInput" placeholder='Benutzername / Email' minlength="3" required>
                <input type="password" name='pass' class="bifiInput" placeholder='Passwort' minlength="4" required>
                <input type="text" style='display: none' name='formType' value='login'>
                <input type="text" style='display: none' name='isRememberTicked' id='isRememberTicked' value='false'>
                <input type="submit" class='bifiInput bifiSubmit' value='Sign Up'>
            </div>
            <div class="bifRemember">
                <div class="bifrlCheckbox unselectable" id='bifrlCheckbox'>
                    <svg class="bifrlCheckboxInner" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.9805 5.99024C26.7207 5.99798 26.4741 6.10656 26.293 6.29298L11 21.5859L4.70703 15.293C4.61489 15.197 4.50452 15.1204 4.38239 15.0676C4.26026 15.0148 4.12883 14.9869 3.99579 14.9856C3.86275 14.9842 3.73077 15.0094 3.6076 15.0597C3.48442 15.11 3.37251 15.1844 3.27843 15.2784C3.18436 15.3725 3.10999 15.4844 3.05971 15.6076C3.00942 15.7308 2.98421 15.8628 2.98556 15.9958C2.98692 16.1288 3.0148 16.2603 3.06759 16.3824C3.12037 16.5045 3.197 16.6149 3.29297 16.707L10.293 23.707C10.4805 23.8945 10.7348 23.9998 11 23.9998C11.2652 23.9998 11.5195 23.8945 11.707 23.707L27.707 7.70704C27.8515 7.56658 27.9502 7.38574 27.9902 7.18822C28.0301 6.9907 28.0095 6.78571 27.931 6.60013C27.8524 6.41454 27.7196 6.25701 27.55 6.14818C27.3804 6.03935 27.1819 5.9843 26.9805 5.99024Z" fill="black"/>
                    </svg>
                </div>
                <div class="bifrlcText text-small-size">Erinnere mich</div>
            </div>
            <div class="bifrText text-small-size">Haben Sie noch kein Konto? <span><a href="register" class='w500'>Registrieren</a></span></div>
            <div class="bifrText bifrTextBack text-small-size"><span><a href="/" class='w500'>Zurück</a></span></div>
        </form>
    </div>
</div>









<?php
if(isset($_SESSION['regSuc'])){
    echo "<script>setTimeout(function(){alert('Successfully registered, please sign in')}, 200)</script>";
}
if(isset($_SESSION['logErr'])){
    echo "<script>setTimeout(function(){alert('Username or password is incorrect')}, 200)</script>";
}

unset($_SESSION['regSuc']);
unset($_SESSION['logErr']);
?>
<!DOCTYPE html>
<html lang = "en"
<head><?php include __DIR__ . "/header.php"?>
    <meta charset = "UTF-8"
    <title></title>
    <style>@import url("https://rsms.me/inter/inter.css");

        :root {
            --color-gray: #ffffff;
            --color-lighter-gray: #e3e5ed;
            --color-light-gray: #f7f7fa;
        }
        body {
            background-color: #23232F;
        }
        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        html {
            font-family: "Inter", sans-serif;
            font-size: 14px;
            box-sizing: border-box;

        }

        @supports (font-variation-settings: normal) {
            html {
                font-family: "Inter var", sans-serif;

            }
        }

        body {
            margin: 0;
        }

        h1 {
            margin-bottom: 1rem;
        }

        p {
            color: var(--color-gray);
        }

        hr {
            height: 1px;
            width: 100%;
            background-color: #FFFFFF;
            border: 0;
            margin: 2rem 0;
        }

        .container {
            max-width: 40rem;
            padding: 10vw 2rem 0;
            margin: 0 auto;
            height: 100vh;
            color: #FFFFFF;
        }

        .form {
            display: grid;
            grid-gap: 1rem;

        }

        .field {
            width: 100%;
            display: flex;
            flex-direction: column;
            /*border: 1px solid var(--color-lighter-gray);*/
            padding: .5rem;
            border-radius: .25rem;

        }

        .field__label {

            /*font-size: 0.6rem;*/
            font-size: 12px;
            font-weight: 300;
            text-transform: uppercase;
            margin-bottom: 0.25rem
            color: #FFFFFF;
        }

        .field__input {
            padding-left: 5px;
            margin: 0;
            border: 0;
            outline: 0;
            font-weight: bold;
            font-size: 1rem;
            width: 100%;
            -webkit-appearance: none;
            appearance: none;
            background-color: white;
            color: black;
            border-radius: 8px;
        }
        .field:focus-within {
            border-color: #000;
        }

        .fields {
            display: grid;
            grid-gap: 1rem;
        }
        .fields--2 {
            grid-template-columns: 1fr 1fr;
        }
        .fields--3 {
            grid-template-columns: 1fr 1fr 1fr;
        }

        .button {
            background-color: #24298f;
            text-transform: uppercase;
            font-size: 0.8rem;
            font-weight: 600;
            display: block;
            color: #FFFFFF;
            width: 100%;
            padding: 1rem;
            border-radius: 0.25rem;
            border: 0;
            cursor: pointer;
            outline: 0;
        }
        .button:focus-visible {
            background-color: #333;
        }</style>
</head>
</body><div class="container">
    <h1>Betalen</h1>
    <p>Vul uw gegevens in.</p>
    <hr />
    <form action="connect.php" method="post">
    <div class="form">
        <div class="fields fields--2">
            <label class="field">
                <span class="field__label" for="firstname">First name</span>
                <input class="field__input" type="text" id="firstname" name="firstsname" />
            </label>
            <label class="field">
                <span class="field__label" for="lastname">Last name</span>
                <input class="field__input" type="text" id="lastname" name="lastname" />
            </label>
        </div>
        <label class="field">
            <span class="field__label" for="address">Address</span>
            <input class="field__input" type="text" id="address" name="address"/>
        </label>
        <label class="field">
            <span class="field__label" for="land">land</span>
            <select class="field__input" id="land" name="land">
                <option value=""></option>
                <option value="Nerderland">Nederland</option>
                <option value="Belgie">Belgie</option>
                <option value="Spanje">Spanje</option>
                <option value="United States">United States</option>
                <option value="Duitsland">Duitsland</option>
                <option value="Frankrijk">Frankrijk</option>
            </select>
        </label>
        <div class="fields fields--3">
            <label class="field">
                <span class="field__label" for="postcode">postcode</span>
                <input class="field__input" type="text" id="zipcode" name="zipcode" />
            </label>
            <label class="field">
                <span class="field__label" for="plaats">plaats</span>
                <input class="field__input" type="text" id="city" name="city" />
            </label>
            <label class="field">
                <span class="field__label" for="provincie">provincie</span>
                <input class="field__input" type="text" id="provincie" name="provincie"/>
            </label>
        </div>
    </div>
    </form>
    <div class="field">
        <label class="field">
            <span class="field__label" for="bank">bank</span>
            <select class="field__input" id="bank" name="bank">
                <option value=""></option>
                <option value="ING">ING</option>
                <option value="KNAB">KNAB</option>
                <option value="RABO">RABO</option>
                <option value="ABN">ABN</option>
                <option value="AMRO">AMRO</option>
                <option value="BNG">BNG</option>
                <optoin value="NWB">NWB</optoin>
            </select>
    </div>
    <hr>
    <a class="button" href="Bedanktbestellen.php">Betalen</a>
</div>

</body>
</html>

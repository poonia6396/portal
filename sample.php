tion-Form-2368966/
<!DOCTYPE html>
<html>
  <head>
    <title>Employment Verification Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, label { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 13px;
      color: #666;
      line-height: 22px;
      }
      legend { 
      color: #fff;
      background-color: #095484;
      padding: 3px 5px;
      font-size: 20px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 36px;
      color: #fff;
      z-index: 2;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 20px 0  #095484; 
      }
      .banner {
      position: relative;
      height: 320px;
      background-image: url("/uploads/media/default/0001/02/19ea6ba00def11fb8f5113a4d7555a97bd58ce3d.jpeg");  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.6); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color:#095484;
      }
      .item input:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #095484;
      color:#095484;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item span {
      color: red;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #095484;
      }
      .item i {
      right: 2%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #095484;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #4286f4;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .city-item input,.name-item div {
      width: calc(50% - 20px);
      }
      .name-item div input {
      width:97%;}
      .name-item div label {
      display:block;
      padding-bottom:5px;
      }
      }
    </style>
  </head>
  <body>
    <div class="testbox">
    <form action="/">
      <div class="banner">
        <h1>Employment Verification Form</h1>
      </div>
      <p>Please fill out with the information that is requested below and submit the employment verification form. Thank you!</p>
      <hr/>
      <fieldset>
        <legend>Company Information</legend>
        <div class="item">
          <label for="name">Company Name<span>*</span></label>
          <input id="name" type="text" name="text" required/>
        </div>
        <div class="item">
          <label for="address">Company Address<span>*</span></label>
          <input id="address" type="text" name="text" placeholder="Street Address" required/>
        </div>
        <div class="item">
          <div class="name-item">
            <div>
              <input type="text" name="city" placeholder="City" />
            </div>
            <div>
              <input type="text" name="state" placeholder="State/region" />
            </div>
          </div>
          <div class="item">
            <div class="name-item">
              <div>
                <input type="text" name="code" placeholder="ZIP Code" />
              </div>
              <div>
                <select>
                  <option selected value="" disabled selected>Country</option>
                  <option value="1">Russia</option>
                  <option value="2">Germany</option>
                  <option value="3">France</option>
                  <option value="4">Armenia</option>
                  <option value="5">USA</option>
                  <option value="6">Spain</option>
                  <option value="7">Italy</option>
                </select>
              </div>
            </div>
          </div>
      </fieldset>
      </br>
      <fieldset>
      <legend>Employee Information</legend>
      <div class="item">
      <label for="name">Name<span>*</span></label>
      <div class="name-item">
      <input id="name" type="text" name="name" placeholder="First" required/>
      <input id="name" type="text" name="name" placeholder="Last" required/>
      </div>
      </div>
      <div class="item">
      <label for="bdate">Date of Birth<span>*</span></label>
      <input id="bdate" type="date" name="bdate" required/>
      <i class="fas fa-calendar-alt"></i>
      </div>
      <div class="item">
      <label for="email">Email<span>*</span></label>
      <input id="email" type="text" name="text" required/>
      </div>
      <div class="item">
      <label for="position">Position<span>*</span></label>
      <input id="position" type="text" name="text" required />
      </div>
      <fieldset>
      <div class="btn-block">
      <button type="submit" href="/">APPLY</button>
      </div>
    </form>
    </div>
  </body>
</html>
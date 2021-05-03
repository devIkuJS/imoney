<!doctype html>
<html>

<head>
  <meta name="viewport" content="width=device-width" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Email</title>
  <style>
    /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */

    /*All the styling goes here*/

    img {
      border: none;
      -ms-interpolation-mode: bicubic;
      max-width: 100%;
    }

    h2 {
      font-size: 21px;
      color: #0274be !important;
      font-weight: bold;
      text-align: center !important;
    }

    #tablaTransaccion th {

      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #0274be;
      color: white;
    }

    #tablaTransaccion td,
    #tablaTransaccion th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #tablaTransaccion tr:hover {
      background-color: #ddd;
    }

    body {
      background-color: #f6f6f6;
      font-family: Helvetica, sans-serif;
      font-weight: bold !important;
      -webkit-font-smoothing: antialiased;
      font-size: 14px;
      line-height: 1.4;
      margin: 0;
      padding: 0;
      -ms-text-size-adjust: 100%;
      -webkit-text-size-adjust: 100%;
    }

    table {
      border-collapse: separate;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      width: 100%;
    }

    table td {
      font-family: sans-serif;
      font-size: 16px;
      vertical-align: top;
    }

    /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

    .body {
      background-color: #f6f6f6;
      width: 100%;
    }

    /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
    .container {
      display: block;
      margin: 0 auto !important;
      /* makes it centered */
      max-width: 580px;
      padding: 10px;
      width: 580px;

    }

    /* This should also be a block element, so that it will fill 100% of the .container */
    .content {
      box-sizing: border-box;
      display: block;
      margin: 0 auto;
      max-width: 580px;
      padding: 10px;
    }

    /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
    .main {
      background: #ffffff;
      border-radius: 3px;
      width: 100%;
    }

    .wrapper {
      box-sizing: border-box;
      padding: 20px;
    }

    .content-block {
      padding-bottom: 10px;
      padding-top: 10px;
    }

    .footer {
      clear: both;
      margin-top: 10px;
      text-align: center;
      width: 100%;
    }

    .footer td,
    .footer p,
    .footer span,
    .footer a {
      color: #999999;
      font-size: 12px;
      text-align: center;
    }

    /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */

    h2 {
      color: #01498a;
      font-family: Helvetica, sans-serif;
      font-weight: 400;
      font-weight: bold;
      line-height: 1.4;
      margin: 0;
      margin-bottom: 30px;
    }

    h3 {
      color: #0274be;
      font-family: Helvetica, sans-serif;
      font-weight: 400;
      font-weight: bold;
      line-height: 1.4;
      margin: 0;
      margin-bottom: 30px;
    }

    h4 {
      color: #7f7f7f;
      font-family: Helvetica, sans-serif;
      font-weight: 400;
      font-weight: bold;
      line-height: 1.4;
      margin: 0;
      margin-bottom: 30px;
      margin-top: 30px;
    }

    h1 {
      font-size: 35px;
      font-weight: 300;
      text-align: center;
      color: #0274be;
      text-transform: capitalize;
    }

    p,
    ul,
    ol {
      font-family: Helvetica, sans-serif;
      font-size: 14px;
      font-weight: normal;
      margin: 0;
      margin-bottom: 15px;
    }

    p li,
    ul li,
    ol li {
      list-style-position: inside;
      margin-left: 5px;
      color: #0274be;
    }

    a {
      color: #3498db;
      text-decoration: underline;
    }

    /* -------------------------------------
          BUTTONS
      ------------------------------------- */
    .btn {
      box-sizing: border-box;
      width: 100%;
    }

    .btn>tbody>tr>td {
      padding-bottom: 15px;
    }

    .btn table {
      width: auto;
    }

    .btn table td {
      background-color: #ffffff;
      border-radius: 5px;
      text-align: center;
    }

    .btn a {
      background-color: #ffffff;
      border: solid 1px #3498db;
      border-radius: 5px;
      box-sizing: border-box;
      color: #3498db;
      cursor: pointer;
      display: inline-block;
      font-size: 14px;
      font-weight: bold;
      margin: 0;
      padding: 12px 25px;
      text-decoration: none;
      text-transform: capitalize;
    }

    .btn-primary table td {
      background-color: white;
    }

    .btn-primary a {
      background-color: #0274be;
      border-color: #0274be;
      margin-left: auto !important;
      margin-right: auto !important;
      color: #ffffff;
    }

    /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
    .last {
      margin-bottom: 0;
    }

    .first {
      margin-top: 0;
    }

    .align-center {
      text-align: center;
    }

    .align-right {
      text-align: right;
    }

    .align-left {
      text-align: left;
    }

    .clear {
      clear: both;
    }

    .mt0 {
      margin-top: 0;
    }

    .mb0 {
      margin-bottom: 0;
    }

    .preheader {
      color: transparent;
      display: none;
      height: 0;
      max-height: 0;
      max-width: 0;
      opacity: 0;
      overflow: hidden;
      mso-hide: all;
      visibility: hidden;
      width: 0;
    }

    .powered-by a {
      text-decoration: none;
    }

    hr {
      border: 0;
      border-bottom: 1px solid #f6f6f6;
      margin: 20px 0;
    }

    /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }

      table[class=body] p,
      table[class=body] ul,
      table[class=body] ol,
      table[class=body] td,
      table[class=body] span,
      table[class=body] a {
        font-size: 16px !important;
      }

      table[class=body] .wrapper,
      table[class=body] .article {
        padding: 10px !important;
      }

      table[class=body] .content {
        padding: 0 !important;
      }

      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }

      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }

      table[class=body] .btn table {
        width: 100% !important;
      }

      table[class=body] .btn a {
        width: 100% !important;
      }

      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
    }

    /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
    @media all {
      .ExternalClass {
        width: 100%;
      }

      .ExternalClass,
      .ExternalClass p,
      .ExternalClass span,
      .ExternalClass font,
      .ExternalClass td,
      .ExternalClass div {
        line-height: 100%;
      }

      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }

      #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
      }

      /* .btn-primary table td:hover {
          background-color: #ddd; !important; 
        }*/
    }
  </style>
</head>

<body class="">
  <span class="preheader"></span>
  <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
    <tr>
      <td>&nbsp;</td>
      <td class="container">
        <div class="content">

          <!-- START CENTERED WHITE CONTAINER -->
          <table role="presentation" class="main">

            <!-- START MAIN CONTENT AREA -->
            <tr>
              <td class="wrapper" align="center">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center">
                      <img src={{asset('imagenes/logo-mail-4.png')}} alt="Fjords" style="width:10%,text-align:center;"
                        class="img-fluid-alex">

                      <h2>Transacción No procesada</h2>
                      <h3 style="color:black !important;">Tu número de orden es: {{$email_data['nro_orden']}} </h3>
                      <h4 class="text-danger">Su transacción no pudo ser realizada , por favor comuníquese a nuestro número de whastapp en linea con el número de orden </h4>
                      <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                        <tbody>
                          <tr>
                            <td align="center">
                              <table id="tablaTransaccion" role="presentation" border="3" cellpadding="0"
                                cellspacing="0" style="width: 100%;border-collapse: collapse;">
                                <tbody>
                                  <tr>
                                    <th>Cambio</th>
                                    <th>Envìas</th>
                                    <th>Recibiras </th>
                                  </tr>
                                  <tr>
                                    <td>De {{$email_data['descripcionMontoA']}} a {{$email_data['descripcionMontoB']}}</td>
                                    <td>{{$email_data['montoA']}} {{$email_data['descripcionMontoA']}}</td>
                                    <td>{{$email_data['montoB']}} {{$email_data['descripcionMontoB']}}</td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                       
                       <small style="font-size: 12px;color:gray;">Si tuviese alguna consulta, duda sobre su transaccion por favor comunicarse a nuestro <a  href="https://api.whatsapp.com/send?phone=+51982273702&text=Tengo%20una%20consulta"
                        target="_blank">whastapp en linea</a></small>

                    </td>
                  </tr>
                </table>
              </td>
            </tr>

            <!-- END MAIN CONTENT AREA -->
          </table>
          <!-- END CENTERED WHITE CONTAINER -->

          <!-- START FOOTER -->
          <div class="footer">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td class="content-block">
                  <span class="apple-link">Todos los derechos reservados iMoney &#169;</span>
                </td>
              </tr>
            </table>
          </div>
          <!-- END FOOTER -->

        </div>
      </td>
      <td>&nbsp;</td>
    </tr>
  </table>
</body>

</html>
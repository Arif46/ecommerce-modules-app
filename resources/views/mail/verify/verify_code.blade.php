@extends('mail.layout.base')

@section('content')
<!-- Header Start -->
  <div class="u-row-container bg-info" style="padding: 0px;">
    <div class="u-row"
      style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
      <div
        style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">

        <div class="u-col u-col-100"
          style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
          <div style="height: 100%;width: 100% !important;">
            <div
              style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">

              <table id="u_content_image_1" style="font-family:'Montserrat',sans-serif;" role="presentation"
                cellpadding="0" cellspacing="0" width="100%" border="0">
                <tbody>
                  <tr>
                    <td class="v-container-padding-padding"
                      style="overflow-wrap:break-word;word-break:break-word;padding:30px 10px;font-family:'Montserrat',sans-serif;"
                      align="left">

                      <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                          <td style="padding-right: 0px;padding-left: 0px;" align="center">
                            <!-- Header with background color -->
                            <h1 class="v-line-height v-font-size" style="color: #FFF; margin: 0px; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: 'Open Sans',sans-serif; font-size: 24px;">
                              <div><strong>{{ $header_title }}</strong></div>
                            </h1>
                            <!-- <img align="center" border="0" src="images/image-6.png" alt="Image" title="Image"
                              style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: 150px;float: none; class="v-src-width v-src-max-width" /> -->

                          </td>
                        </tr>
                      </table>

                    </td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Header End -->

<!-- Main Body Content Start -->
  <div class="u-row-container" style="padding: 0px;background-color: #e9e9f3">
    {{-- <div class="u-row" style="padding: 20px">
      <p>Dear {{ $user->first_name . ' ' .$user->last_name  }},</p>
    </div> --}}
    <div class="u-row"
      style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
      <div
        style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">

        <div class="u-col u-col-100"
          style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
          <div
            style="background-color: #e9e9f3;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
            <div
              style="height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">

              <table style="font-family:'Montserrat',sans-serif;" role="presentation" cellpadding="0"
                cellspacing="0" width="100%" border="0">
                <tbody>
                  <tr>
                    <td class="v-container-padding-padding"
                      style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px 10px;font-family:'Montserrat',sans-serif;"
                      align="left">

                      <div class="v-line-height"
                        style="line-height: 140%; text-align: center; word-wrap: break-word;">
                        {{-- <p style="font-size: 14px; line-height: 140%;"><span
                            style="font-size: 18px; line-height: 25.2px;">Enjoy 15 Days Free Trail!</span></p> --}}
                      </div>

                    </td>
                  </tr>
                </tbody>
              </table>

              <table id="u_content_text_4" style="font-family:'Montserrat',sans-serif;" role="presentation"
                cellpadding="0" cellspacing="0" width="100%" border="0">
                <tbody>
                  <tr>
                    <td class="v-container-padding-padding"
                      style="overflow-wrap:break-word;word-break:break-word;padding:0px 50px 40px;font-family:'Montserrat',sans-serif;"
                      align="left">

                      <div class="v-line-height" style="line-height: 160%; text-align: center; word-wrap: break-word;">
                        <p style="font-size: 14px; line-height: 170%;">Seems like you forgot your password for Ask Me. If this is true, copy this password verification code and use it to your verification page.</p>
                        <h1>{{ $token }}</h1>
                      </div>

                    </td>
                  </tr>
                </tbody>
              </table>

              {{-- <table id="u_content_button_1" style="font-family:'Montserrat',sans-serif;" role="presentation"
                cellpadding="0" cellspacing="0" width="100%" border="0">
                <tbody>
                  <tr>
                    <td class="v-container-padding-padding"
                      style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px 40px;font-family:'Montserrat',sans-serif;"
                      align="left">

                      <div align="center">
                        <!-- Main Clicking Button -->
                          <a href="{{ $reset_password_url }}" target="_blank" class="v-button v-size-width bg-danger"
                          style="box-sizing: border-box;display: inline-block;font-family:'Montserrat',sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;border-radius: 25px;-webkit-border-radius: 25px; -moz-border-radius: 25px; width:35%; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
                          <span class="v-line-height"
                            style="display:block;padding:10px 20px;line-height:120%;"><span
                              style="font-size: 14px; line-height: 16.8px;">Reset My Password</span></span>
                        </a>

                      </div>

                    </td>
                  </tr>
                </tbody>
              </table> --}}


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Main Body Content End -->


@endsection

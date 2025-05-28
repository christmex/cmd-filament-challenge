<!-- Main Table Wrapper -->
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f8f9fa; padding: 20px; font-family: 'Open Sans', Arial, sans-serif;">
    <tr>
        <td align="center">
            <!-- Email Container -->
            <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); font-family: 'Open Sans', Arial, sans-serif;">
                <!-- Header Section -->
                <tr>
                    <td style="padding: 30px; background-color: #f2f4f5; text-align: left; vertical-align: middle;">
                        <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tbody>
                                <tr>
                                    <td style="width:72px;" width="72">
                                        <img src="{{asset('logo.png')}}" alt="Logo CMD" style="display: block; width: 72px; height: auto;">
                                    </td>
                                    <td style="padding-left: 8px;">
                                        <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h1 style="margin: 0; font-size: 24px; color: #333333; font-family: 'Open Sans', Arial, sans-serif;">
                                                            Hi {{ $record->name }}
                                                        </h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="margin: 5px 0 0; font-size: 20px; font-weight: bold; color: #333333; font-family: 'Open Sans', Arial, sans-serif;">
                                                            We're sorry, your Quote has been rejected
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <!-- Content Section -->
                <td style="padding: 30px; text-align: center; font-family: 'Open Sans', Arial, sans-serif;">
                    <p style="margin: 0; font-size: 14px; line-height: 1.6; color: #555555; font-family: 'Open Sans', Arial, sans-serif;text-align: left;">
                        Your quote with the details below has been rejected:
                    </p>
                    <br>
                    <h1 style="margin: 0; font-size: 14px;font-weight:bold; color: #333333; font-family: 'Open Sans', Arial, sans-serif;text-align:left">
                        Reference Number: {{ $record->reference_number }}
                    </h1>
                    <h1 style="margin: 0; font-size: 14px;font-weight:bold; color: #333333; font-family: 'Open Sans', Arial, sans-serif;text-align:left">
                        Service Type: {{ $record->service_type->label() }}
                    </h1>
                    <h1 style="margin: 0; font-size: 14px;font-weight:bold; color: #333333; font-family: 'Open Sans', Arial, sans-serif;text-align:left">
                        Booking Date: {{ $record->booking_date }}
                    </h1>
                    <h1 style="margin: 0; font-size: 14px;font-weight:bold; color: #333333; font-family: 'Open Sans', Arial, sans-serif;text-align:left">
                        Duration: {{ $record->duration }} Hour(s)
                    </h1>
                    <h1 style="margin: 0; font-size: 14px;font-weight:bold; color: #333333; font-family: 'Open Sans', Arial, sans-serif;text-align:left">
                        Reason: {{ $record->rejection_reason }}
                    </h1>
                    <br>
                    <p style="margin: 0; font-size: 14px; line-height: 1.6; color: #555555; font-family: 'Open Sans', Arial, sans-serif;text-align: left;">
                        If this was a mistake please contact us.
                    </p>
                </td>
            </table>
        </td>
    </tr>
</table>

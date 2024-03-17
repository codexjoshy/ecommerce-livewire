@props(['href'=>''])

<tr>
    <td align="left" vertical-align="middle" style="font-size:0px;padding:10px 25px;word-break:break-word;">
        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;">
        <tbody><tr>
            <td align="center" bgcolor="#043768" role="presentation" style="border:none;border-radius:3px;cursor:auto;mso-padding-alt:10px 25px;background:#043768;" valign="middle">
            <a href="{{ $href }}" style="display: inline-block; background: #043768; color: white; font-family: Poppins, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; line-height: 30px; margin: 0; text-decoration: none; text-transform: none; padding: 10px 25px; mso-padding-alt: 0px; border-radius: 3px;" target="_blank"> {{ $slot }} </a>
            </td>
        </tr>
        </tbody></table>
    </td>
</tr>
<table class="footer default" align="center" width="570" cellpadding="0" cellspacing="0" style="width:570px !important; padding: 10px 20px;">
   <tbody>
      <tr>
         <td colspan="5">
            <div style="display:none; max-height: 0px; overflow: hidden; color: #FFF">{{ $headerText }}</div> 
         </td>
      </tr>

      <tr>
         <td colspan="5" style="padding-top: 25px; text-align:center; padding-bottom: 25px;">
            <a href="{{ route('home') }}">
               <img src="{{ asset('images/Logo_Spectrum.png') }}" alt="" width="250" style="width: 250px;">
            </a>
         </td>
      </tr>
   <tbody>
</table>

<table align="center" width="570" style="width:570px; border-bottom: 2px dashed #cccccc; margin: 0 auto; text-align:center;">

   <tbody>

      <tr style="margin-bottom:10px; text-align: center; font-size:1.2rem; font-weight: normal; height: 40px;">

         <td style="text-align: center; width: 20%; border: 1px solid #cccccc;">
            <a href=" {{ route('about') }}" style="text-decoration: none; color: #000000;">Despre noi</a>
         </td>
         <td style="text-align: center; width: 20%; border: 1px solid #cccccc;">
            <a href=" {{ route('categories_all') }}" style="text-decoration: none; color: #000000;">Produse</a>
         </td>
         <td style="text-align: center; width: 20%; border: 1px solid #cccccc;">
            <a href=" {{ route('projects_all') }}" style="text-decoration: none; color: #000000;">Proiecte</a>
         </td>
         <td style="text-align: center; width: 20%; border: 1px solid #cccccc;">
            <a href=" {{ route('news_all') }}" style="text-decoration: none; color: #000000;">Noutati</a>
         </td>
         <td style="text-align: center; width: 20%; border: 1px solid #cccccc;">
            <a href=" {{ route('contact') }}" style="text-decoration: none; color: #000000;">Contact</a>
         </td>
      </tr>

   </tbody>

</table>
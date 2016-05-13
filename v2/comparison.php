<?php include '_includes/header.php' ?>
<h1>Eclipse Paho Client Comparison</h1>

<div class="panel panel-default">
  <div class="panel-body">
      <table class="table table-hover table-bordered table-condensed">
           <thead>
                <tr>
                     <th>Client</th>
                     <th>MQTT 3.1</th>
                     <th>MQTT 3.1.1</th>
                     <th>LWT</th>
                     <th>SSL / TLS</th>
                     <th>Automatic Reconnect</th>
                     <th>Offline Buffering</th>
                     <th>Message Persistence</th>
                     <th>WebSocket Support</th>
                     <th>Standard MQTT Support</th>

                 </tr>
             </thead>
             <tbody>
                 <tr>
                    <th scope="row">Java</th>
                    <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                    <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                    <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                    <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                    <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                    <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                    <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                    <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                    <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                </tr>
                <tr>
                   <th scope="row">Python</th>
                   <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                   <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                   <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                   <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                   <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                   <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                   <td class="text-center danger"><i class="fa fa-times" aria-hidden="true"></i></td>
                   <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                   <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
               </tr>
               <tr>
                  <th scope="row">JavaScript</th>
                  <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                  <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                  <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                  <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                  <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                  <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                  <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                  <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                  <td class="text-center danger"><i class="fa fa-times" aria-hidden="true"></i></td>
              </tr>
              <tr>
                 <th scope="row">GoLang</th>
                 <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                 <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                 <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                 <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                 <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                 <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                 <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                 <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                 <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
             </tr>
             <tr>
                <th scope="row">C</th>
                <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
                <td class="text-center danger"><i class="fa fa-times" aria-hidden="true"></i></td>
                <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
            </tr>
            <tr>
               <th scope="row">.Net (C#)</th>
               <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
               <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
               <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
               <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
               <td class="text-center danger"><i class="fa fa-times" aria-hidden="true"></i></td>
               <td class="text-center danger"><i class="fa fa-times" aria-hidden="true"></i></td>
               <td class="text-center danger"><i class="fa fa-times" aria-hidden="true"></i></td>
               <td class="text-center danger"><i class="fa fa-times" aria-hidden="true"></i></td>
               <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
           </tr>
           <tr>
              <th scope="row">Android Service</th>
              <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
              <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
              <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
              <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
              <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
              <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
              <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
              <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
              <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
          </tr>
          <tr>
             <th scope="row">Embedded C/C++</th>
             <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
             <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
             <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
             <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
             <td class="text-center danger"><i class="fa fa-times" aria-hidden="true"></i></td>
             <td class="text-center danger"><i class="fa fa-times" aria-hidden="true"></i></td>
             <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
             <td class="text-center danger"><i class="fa fa-times" aria-hidden="true"></i></td>
             <td class="text-center success"><i class="fa fa-check" aria-hidden="true"></i></td>
         </tr>

             </tbody>
         </table>

  </div>
</div>

<?php include '_includes/footer.php' ?>

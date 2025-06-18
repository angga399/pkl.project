
<div class="visible-print text-center">
    {!! QrCode::size(100)->generate('kontol');!!}
    <p>scan me to return the originsl</p>
</div>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <div id="reader" width="600px"></div>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
  console.log(`Code matched = ${decodedText}`, decodedResult);
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:

}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
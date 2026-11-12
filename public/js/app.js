function onScanSuccess(barcode) {
  let el = document.getElementById('hasil-scan');
  el.innerHTML = "Scan: <b>" + barcode + "</b> ... memproses";
  
  fetch('../api/proses_scan.php', {
    method: 'POST',
    headers: {'Content-Type':'application/json'},
    body: JSON.stringify({barcode: barcode})
  }).then(r=>r.json()).then(d=>{
    el.innerHTML = "<b style='color:green'>"+d.message+"</b>";
    alert(d.message);
    if(d.status=='ok') {
      setTimeout(()=>location.reload(), 500);
    }
  }).catch(e=>{
    el.innerHTML = "<b style='color:red'>Error koneksi: "+e+"</b>";
  });
}
let readerEl = document.getElementById('reader');
if(readerEl){
  let scanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: {width:250, height:100} });
  scanner.render(onScanSuccess);
}
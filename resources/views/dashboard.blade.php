<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>POS - Bar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mb-4">Point de Vente - Bar</h2>
        <div class="row"> <!-- Liste des produits -->
            <div class="col-md-8">
                <ul class="nav nav-tabs mb-3" id="categoryTabs" role="tablist">
                    <li class="nav-item" role="presentation"> <button
                        class="nav-link " data-bs-toggle="tab"
                        data-bs-target="#cat"> </button> </li>
                     </ul>
                <div class="tab-content"> <div
                    class="tab-pane fade " id="">
                    <div class="row">  <div class="col-6 col-md-4 mb-3"> <button
                        class="btn btn-outline-primary w-100"
                        onclick="">
                         <br><strong> €</strong>
                    </button> </div>  </div>
                </div>  </div>
            </div> <!-- Ticket -->
            <div class="col-md-4">
                <h5>Commande en cours</h5>
                <ul class="list-group mb-3" id="orderItems"> <!-- Items dynamiques --> </ul>
                <p><strong>Total : <span id="total">0.00</span> €</strong></p> <button class="btn btn-success w-100"
                    onclick="payOrder()">Encaisser</button>
            </div>
        </div>
    </div> 
    <script> let order = []; function addToOrder(id, name, price) { let item = order.find(i => i.id === id); if (item) { item.qty++; } else { order.push({ id, name, price, qty: 1 }); } renderOrder(); } function renderOrder() { let list = document.getElementById('orderItems'); list.innerHTML = ''; let total = 0; order.forEach(item => { total += item.qty * item.price; let li = document.createElement('li'); li.className = 'list-group-item d-flex justify-content-between align-items-center'; li.innerHTML = `${item.qty}x ${item.name}<span>${(item.qty * item.price).toFixed(2)} €</span>`; list.appendChild(li); }); document.getElementById('total').textContent = total.toFixed(2); } function payOrder() { if (order.length === 0) { alert("Aucune commande."); return; } alert("Commande payée !"); order = []; renderOrder(); } </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   
</body>

</html>
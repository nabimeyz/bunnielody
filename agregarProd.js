function agregarProd (id) {
    let url = '/carrito/carrito.php';
    let formData = new forData ();
    formdata.append('id', id)

    fetch (url, {
        method: 'POST',
        body: formData,
        mode: 'cors'
    }).then(response => response.json());
}
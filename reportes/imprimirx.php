<Html>
<Head>
    <Meta charset="UTF-8">
    <Title></Title>
    <Script type="text/javascript">
        function imprime() {
            if (window.print) {
                window.print();
            } else {
                alert("La función de impresion no esta soportada por su navegador.");
            }
        }
    </Script>
</Head>
<Body onload="imprime();">
Hola Mundo
</Body>
</Html>
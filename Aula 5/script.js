function calcular() {
   
    num1 = parseFloat(document.getElementById('campo_n1').value);
    num2 = parseFloat(document.getElementById('campo_n2').value);
    operacao = document.getElementById('operacao').value;

    resultadodiv = document.querySelector('.campo_resultado');
    resultadoElemento = document.getElementById('Resultado');
    let resultado;

    resultadodiv.classList.remove('resultado_negativo', 'resultado_0', 'resultado_positivo');

    if (operacao === '+') {
        resultado = num1 + num2;
    } else if (operacao === '-') {
        resultado = num1 - num2;
    } else if (operacao === '*') {
        resultado = num1 * num2;
    } else if (operacao === '/') {
        resultado = num1 / num2;
    }

    if (resultado > 0) {
        resultadodiv.classList.add('resultado_positivo');
    }

        else if (resultado < 0) {
            resultadodiv.classList.add('resultado_negativo');
        }    

        else if (resultado === 0) {
            resultadodiv.classList.add('resultado_0');
        }    
        
    resultadoElemento.textContent = resultado;
}

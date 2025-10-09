//não deu de fazer sem auxilio ;(
function adicionarLinhaMedia() {
    const tabela = document.getElementById('tabela-notas');
    const linhas = tabela.rows;

    const novaLinha = tabela.insertRow();
    const primeiraCelula = novaLinha.insertCell();
    primeiraCelula.textContent = 'MÉDIAS';
    primeiraCelula.className = 'media';
    
    const colunas = linhas[2].cells.length; 
    
    for (let i = 1; i < colunas; i++) {
        let soma = 0;
        let contador = 0;
        
        for (let j = 2; j < linhas.length - 1; j++) {
            const celula = linhas[j].cells[i];
            if (celula) {
                const valorTexto = celula.textContent.trim();
                if (valorTexto !== '') {
                    const valor = parseFloat(valorTexto);
                    if (!isNaN(valor)) {
                        soma += valor;
                        contador++;
                    }
                }
            }
        }
        
        const celulaMedia = novaLinha.insertCell();
        celulaMedia.textContent = (contador > 0) ? (soma / contador).toFixed(2) : '-';
        celulaMedia.className = 'media';
    }
}

function adicionarColunaMedia() {
    const tabela = document.getElementById('tabela-notas');
    const linhas = tabela.rows;
    const celulaCabecalho = document.createElement('th');
    celulaCabecalho.textContent = 'MÉDIA';
    celulaCabecalho.className = 'media-aluno';
    celulaCabecalho.rowSpan = 2;
    linhas[0].appendChild(celulaCabecalho);

    for (let i = 2; i < linhas.length; i++) {
        let soma = 0;
        let contador = 0;
        
        for (let j = 1; j < linhas[i].cells.length; j++) {
            const celula = linhas[i].cells[j];
            if (celula) {
                const valorTexto = celula.textContent.trim();
                if (valorTexto !== '') {
                    const valor = parseFloat(valorTexto);
                    if (!isNaN(valor)) {
                        soma += valor;
                        contador++;
                    }
                }
            }
        }
        
        const celulaMedia = document.createElement('td');
        celulaMedia.textContent = (contador > 0) ? (soma / contador).toFixed(2) : '-';
        celulaMedia.className = 'media-aluno';
        linhas[i].appendChild(celulaMedia);
    }
}

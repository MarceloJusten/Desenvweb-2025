class Avaliacao {
    constructor() {
        this.perguntas = [];
        this.perguntaAtual = 0;
        this.respostas = {};
    }

    async init() {
        await this.carregarPerguntas();
        this.configurarEventos();
        this.mostrarPerguntaAtual();
    }

    async carregarPerguntas() {
        try {
            const resposta = await fetch('get_perguntas.php');
            const dados = await resposta.json();
            
            if (dados.success) {
                this.perguntas = dados.perguntas;
                this.mostrarFormulario();
            } else {
                this.mostrarErro('Erro ao carregar perguntas');
            }
        } catch (erro) {
            this.mostrarErro('Erro de conexão');
        }
    }

    mostrarFormulario() {
        document.getElementById('carregando').style.display = 'none';
        document.getElementById('formulario').style.display = 'block';
    }

    mostrarPerguntaAtual() {
        const container = document.getElementById('perguntas-container');
        
        if (this.perguntaAtual < this.perguntas.length) {
            const pergunta = this.perguntas[this.perguntaAtual];
            
            container.innerHTML = `
                <div class="pergunta-container">
                    <div class="pergunta">
                        <div class="pergunta-texto">${pergunta.texto}</div>
                        <div class="escala-com-imagem">
                            <div class="imagem-escala" id="imagem-escala">
                                <img src="images/escala.png" alt="Escala de 0 a 10">
                                <div class="areas-clicaveis">
                                    <div class="area-nota" data-nota="0"></div>
                                    <div class="area-nota" data-nota="1"></div>
                                    <div class="area-nota" data-nota="2"></div>
                                    <div class="area-nota" data-nota="3"></div>
                                    <div class="area-nota" data-nota="4"></div>
                                    <div class="area-nota" data-nota="5"></div>
                                    <div class="area-nota" data-nota="6"></div>
                                    <div class="area-nota" data-nota="7"></div>
                                    <div class="area-nota" data-nota="8"></div>
                                    <div class="area-nota" data-nota="9"></div>
                                    <div class="area-nota" data-nota="10"></div>
                                </div>
                            </div>
                            <div class="legenda">
                                <span>0 - Péssimo</span>
                                <span>10 - Excelente</span>
                            </div>
                            <div class="resposta-info" id="resposta-atual" style="display: none;"></div>
                        </div>
                    </div>
                    
                    <div class="navegacao">
                        <button id="btn-anterior" class="btn-nav" ${this.perguntaAtual === 0 ? 'disabled' : ''}>
                            ← Anterior
                        </button>
                        <div class="contador">
                            Pergunta ${this.perguntaAtual + 1} de ${this.perguntas.length}
                        </div>
                        <button id="btn-proximo" class="btn-nav" ${!this.respostaAtualPreenchida() ? 'disabled' : ''}>
                            ${this.perguntaAtual === this.perguntas.length - 1 ? 'Finalizar →' : 'Próxima →'}
                        </button>
                    </div>
                </div>
            `;

            this.configurarCliqueImagem();
            this.mostrarRespostaSelecionada();
            
        } else {
            this.mostrarFormularioFinal();
        }
    }

    configurarEventos() {
        document.addEventListener('click', (e) => {
            if (e.target.id === 'btn-anterior') {
                this.perguntaAnterior();
            } else if (e.target.id === 'btn-proximo') {
                this.proximaPergunta();
            }
        });
    }

    configurarCliqueImagem() {
        const areas = document.querySelectorAll('.area-nota');
        
        areas.forEach(area => {
            area.addEventListener('click', (e) => {
                const nota = parseInt(e.currentTarget.getAttribute('data-nota'));
                this.selecionarNota(nota);
            });
        });
    }

    selecionarNota(nota) {
        const perguntaAtual = this.perguntas[this.perguntaAtual];
        
        this.respostas[perguntaAtual.id] = nota;
        
        this.mostrarRespostaSelecionada();
        this.atualizarNavegacao();
    }

    mostrarRespostaSelecionada() {
        const perguntaAtual = this.perguntas[this.perguntaAtual];
        const respostaInfo = document.getElementById('resposta-atual');
        const resposta = this.respostas[perguntaAtual.id];
        
        if (resposta !== undefined) {
            respostaInfo.textContent = `Sua avaliação: Nota ${resposta}`;
            respostaInfo.style.display = 'block';
        } else {
            respostaInfo.style.display = 'none';
        }
    }

    respostaAtualPreenchida() {
        const perguntaAtual = this.perguntas[this.perguntaAtual];
        return this.respostas[perguntaAtual.id] !== undefined;
    }

    atualizarNavegacao() {
        const btnProximo = document.getElementById('btn-proximo');
        if (btnProximo) {
            btnProximo.disabled = !this.respostaAtualPreenchida();
        }
    }

    perguntaAnterior() {
        if (this.perguntaAtual > 0) {
            this.perguntaAtual--;
            this.mostrarPerguntaAtual();
        }
    }

    proximaPergunta() {
        if (this.perguntaAtual < this.perguntas.length - 1) {
            this.perguntaAtual++;
            this.mostrarPerguntaAtual();
        } else {
            this.mostrarFormularioFinal();
        }
    }

    mostrarFormularioFinal() {
        const container = document.getElementById('perguntas-container');
        container.innerHTML = `
            <div id="formulario-final">
                <div class="feedback">
                    <h3>Feedback Adicional (Opcional)</h3>
                    <textarea name="feedback" placeholder="Deixe seu comentário..."></textarea>
                </div>
                <button type="button" id="btn-enviar-final" class="btn-enviar">Enviar Avaliação</button>
            </div>
        `;

        document.getElementById('btn-enviar-final').addEventListener('click', () => {
            this.enviarAvaliacao();
        });
    }

    async enviarAvaliacao() {
        const feedback = document.querySelector('textarea[name="feedback"]').value;
        
        const dados = {
            respostas: this.respostas,
            feedback: feedback
        };

        try {
            const resposta = await fetch('salvar_avaliacao.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(dados)
            });

            const resultado = await resposta.json();
            
            if (resultado.success) {
                window.location.href = 'obrigado.html';
            } else {
                alert('Erro ao salvar avaliação');
            }
        } catch (erro) {
            alert('Erro ao enviar avaliação');
        }
    }

    mostrarErro(mensagem) {
        const carregando = document.getElementById('carregando');
        carregando.innerHTML = `
            <div style="color: #e74c3c; text-align: center; padding: 20px;">
                <h3>Erro</h3>
                <p>${mensagem}</p>
                <button onclick="location.reload()" style="padding: 10px 20px; background: #3498db; color: white; border: none; border-radius: 5px; cursor: pointer; margin-top: 10px;">
                    Recarregar
                </button>
            </div>
        `;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new Avaliacao().init();
});
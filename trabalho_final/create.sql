CREATE TABLE avaliacao (
    id SERIAL PRIMARY KEY,
    data_avaliacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pergunta (
    id SERIAL PRIMARY KEY,
    texto TEXT NOT NULL,
    status BOOLEAN DEFAULT TRUE,
    ordem INT DEFAULT 0
);

CREATE TABLE resposta (
    id SERIAL PRIMARY KEY,
    avaliacao_id INT REFERENCES avaliacao(id) ON DELETE CASCADE,
    pergunta_id INT REFERENCES pergunta(id),
    valor INT CHECK (valor >= 0 AND valor <= 10)
);

CREATE TABLE feedback (
    id SERIAL PRIMARY KEY,
    avaliacao_id INT REFERENCES avaliacao(id) ON DELETE CASCADE,
    texto TEXT NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO pergunta (texto, status, ordem) VALUES
('Como você avalia o atendimento dos funcionários?', TRUE, 1),
('Como você avalia a limpeza do ambiente?', TRUE, 2),
('Você recomendaria este estabelecimento?', TRUE, 3);
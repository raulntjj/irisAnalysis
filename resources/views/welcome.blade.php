<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análise da espécie Iris</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            padding: 5% 10%;
            background-color: #fafafa;
        }

        .card{
            padding: 5%;
        }

        .canvas{
            width: 100%;
            height: 150px;
        }

        .link-style{
            text-decoration: none;
        }

        @media (max-width: 768px){
            .canvas{
                height: 800px;
            }
        }
    </style>
</head>
<body>
    <div class="text-center">
        <h2>Análise da espécie Iris</h2>
        <p>Grupo: Raul de Oliveira, Jonas Messias e Bruno Gonçalves</p>
    </div>

    <div class="card mt-5">
        <h5><strong>Coleção de dados</strong></h5>
        <p style="text-align: justify">A coleção de dados Iris é um dos mais conhecidos e amplamente utilizados na área de análise de dados e aprendizado de máquina. Ele foi introduzido pelo estatístico e biólogo Ronald A. Fisher em 1936 e contém 150 amostras de flores, divididas igualmente entre três espécies de Iris: setosa, versicolor, e virginica. Para cada flor, são registradas quatro características morfológicas: comprimento e largura das sépalas, e comprimento e largura das pétalas.</p>

        <p><strong>Descrição das Variáveis</strong><br>
            Sepal Length (Comprimento da Sépala): Medida em centímetros, é a distância do caule ao topo da sépala.<br>
            Sepal Width (Largura da Sépala): Medida em centímetros, é a distância entre as bordas laterais da sépala.<br>
            Petal Length (Comprimento da Pétala): Medida em centímetros, é a distância do caule ao topo da pétala.<br>
            Petal Width (Largura da Pétala): Medida em centímetros, é a distância entre as bordas laterais da pétala.<br>
            Species (Espécie): A espécie da flor (setosa, versicolor, ou virginica).
        </p>
        <p style="text-align: justify">Ao utilizar a coleção de dados Iris, podemos explorar técnicas de análise estatística, como a correlação entre variáveis, visualização gráfica de dados, e a aplicação de modelos preditivos para identificar padrões entre as diferentes espécies de flores. Esse conjunto de dados serve como uma excelente introdução à análise de dados, combinando simplicidade e profundidade em um contexto científico.</p>
        <img src="/iris.jpg" alt="">
    </div>

    <div class="card mt-2">
        <h2 class="text-center">Análise das sépalas</h2>
        <h5 class="mt-5">Gráfico de dispersão</h5>
        <canvas id="sepalChart" class="canvas"></canvas>
        <p class="mt-3">No gráfico acima, cada ponto no gráfico representa uma flor, onde a posição do ponto é determinada pelo comprimento e largura das sépalas. Esse gráfico permite observar a distribuição dos dados e identificar padrões ou diferenças entre as espécies, que podem ser representadas por cores diferentes no gráfico.</p>

        <h5 class="mt-5">Tamanho médio dos tipos</h5>
        <canvas id="averageSepalChart" class="canvas"></canvas>
        <p>Este gráfico apresenta uma comparação visual entre as três espécies de flores Iris: setosa, versicolor, e virginica. Cada ponto no gráfico representa o tamanho médio do comprimento e da largura das sépalas de cada espécie. Isso permite observar como as espécies diferem em termos de dimensões, facilitando a identificação de padrões e características distintas entre elas.</p>
    </div>

    <div class="card mt-2">
        <h2 class="text-center">Análise das pétalas</h2>
        <h5 class="mt-5">Gráfico de dispersão</h5>
        <canvas id="petalChart" class="canvas"></canvas>
        <p class="mt-3">No gráfico acima, cada ponto no gráfico representa uma flor, onde a posição do ponto é determinada pelo comprimento e largura das pétalas. Esse gráfico permite observar a distribuição dos dados e identificar padrões ou diferenças entre as espécies, que podem ser representadas por cores diferentes no gráfico.</p>
        
        <h5 class="mt-5">Tamanho médio dos tipos</h5>
        <canvas id="averagePetalChart" class="canvas"></canvas>
        <p>Este gráfico apresenta uma comparação visual entre as três espécies de flores Iris: setosa, versicolor, e virginica. Cada ponto no gráfico representa o tamanho médio do comprimento e da largura das pétalas de cada espécie. Isso permite observar como as espécies diferem em termos de dimensões, facilitando a identificação de padrões e características distintas entre elas.</p>
    </div>

    <div class="card mt-2">
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('data') }}" class="btn btn-primary">Acesse a coleção de dados</a>
            <a href="{{ route('download') }}" class="link-style" style="margin-left: 20px">Ou faça download do arquivo .csv</a>
        </div>
    </div>

    <script>
        // Recebe os dados do controlador
        const sepalData = @json($sepalData);
        const petalData = @json($petalData);
        const averageSepalData = @json($barData);
        const averagePetalData = @json($barData);

        // Configuração do gráfico de barras com média de tamanhos da sépala
        const averageSepalChart = new Chart(document.getElementById('averageSepalChart'), {
            type: 'bar',
            data: {
                labels: averageSepalData.species,
                datasets: [
                    {
                        label: 'Comprimento da Sépala (média)',
                        data: averageSepalData.sepalLength,
                        backgroundColor: 'rgba(255, 99, 132, 0.6)'
                    },
                    {
                        label: 'Largura da Sépala (média)',
                        data: averageSepalData.sepalWidth,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)'
                    }
                ]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Espécies'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Tamanho (Centímetros)'
                        }
                    }
                }
            }
        });


        const averagePetalChart = new Chart(document.getElementById('averagePetalChart'), {
            type: 'bar',
            data: {
                labels: averagePetalData.species, // Labels para as espécies
                datasets: [
                    {
                        label: 'Comprimento da Pétala (média)',
                        data: averagePetalData.petalLength,
                        backgroundColor: 'rgba(35, 142, 35, 0.6)'
                    },
                    {
                        label: 'Largura da Pétala (média)',
                        data: averagePetalData.petalWidth,
                        backgroundColor: 'rgba(255, 206, 86, 0.6)'
                    }
                ]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Espécies'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Tamanho (Centímetros)'
                        }
                    }
                }
            }
        });

        // Configuração do gráfico de sépala
        const sepalChart = new Chart(document.getElementById('sepalChart'), {
            type: 'scatter',
            data: {
                datasets: sepalData
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Comprimento da sépala (Centímetros)'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Largura da sépala (Centímetros)'
                        }
                    }
                }
            }
        });

        // Configuração do gráfico de pétala
        const petalChart = new Chart(document.getElementById('petalChart'), {
            type: 'scatter',
            data: {
                datasets: petalData
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Comprimento da pétala (Centímetros)'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Largura da pétala (Centímetros)'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>

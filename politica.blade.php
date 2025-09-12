
{{-- Início da seção de Histórico de Versões --}}
@if (!empty($versoesHistoricas)) 
    {{-- A diretiva @if verifica se a variável $versoesHistoricas não está vazia.
         Isso significa: só entra aqui se existir pelo menos um registro de versões. --}}
    
    <div class="mt-4">
        {{-- Cria uma div com margem superior (mt-4 = margin-top: 1.5rem no Bootstrap),
             para dar um espaçamento visual em relação ao conteúdo acima. --}}
        
        <h6 class="fw-bold">Histórico de Versões</h6>
        {{-- Exibe o título da seção em tamanho h6 (menor cabeçalho HTML) 
             e com a classe fw-bold, que deixa o texto em negrito. --}}
        
        <div style="max-height: 250px; overflow-y: auto;" class="border rounded">
            {{-- Esta div envolve a lista de versões.
                 - style="max-height: 250px;" limita a altura máxima em 250 pixels.
                 - overflow-y: auto cria uma barra de rolagem vertical apenas se o conteúdo ultrapassar 250px.
                 - class="border" adiciona uma borda em volta (Bootstrap).
                 - class="rounded" arredonda os cantos da borda. --}}
            
            <ul class="list-group list-group-flush small">
                {{-- Cria uma lista <ul> estilizada pelo Bootstrap.
                     - list-group: transforma os itens em uma lista de estilo card/caixa.
                     - list-group-flush: remove as bordas extras entre os itens, deixando tudo mais "flat".
                     - small: diminui o tamanho da fonte. --}}
                
                @foreach ($versoesHistoricas as $versao)
                    {{-- Início do loop foreach: percorre cada item (objeto $versao) dentro do array/coleção $versoesHistoricas. --}}
                    
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{-- Cada versão é exibida como um item da lista (<li>).
                             Classes usadas:
                             - list-group-item: aplica o estilo de item de lista do Bootstrap.
                             - d-flex: transforma em um flex container (layout flexível).
                             - justify-content-between: distribui os elementos para as extremidades (esquerda e direita).
                             - align-items-center: centraliza verticalmente o conteúdo. --}}
                        
                        <div>
                            {{-- Div para agrupar o título e a data da versão, alinhados à esquerda. --}}
                            
                            <strong>{{ $versao->titulo }}</strong><br>
                            {{-- Exibe o título da versão em negrito (<strong>).
                                 Depois um <br> para quebrar a linha e jogar a data para baixo. --}}
                            
                            <span class="text-muted">
                                {{ $versao->updated_at->format('d/m/Y H:i') }}
                            </span>
                            {{-- Exibe a data/hora da última atualização da versão.
                                 - $versao->updated_at é um campo de data/hora vindo do banco.
                                 - ->format('d/m/Y H:i') formata a data para o padrão brasileiro:
                                   dia/mês/ano + hora:minutos (ex: 12/09/2025 10:42).
                                 - text-muted aplica estilo de cor cinza claro (Bootstrap), 
                                   deixando menos chamativo do que o título. --}}
                        </div>
                        
                        @if ($versao->arquivo)
                            {{-- Verifica se a versão possui um arquivo associado (campo $versao->arquivo não é nulo/vazio). --}}
                            
                            <a href="{{ asset('storage/' . $versao->arquivo) }}" 
                               target="_blank" 
                               class="btn btn-sm btn-outline-primary">
                                {{-- Cria um link (<a>) que aponta para o arquivo.
                                     - asset('storage/' . $versao->arquivo): gera a URL pública para acessar o arquivo salvo em "storage".
                                     - target="_blank": abre o link em uma nova aba do navegador.
                                     - class="btn btn-sm btn-outline-primary": aplica estilo de botão pequeno do Bootstrap,
                                       com borda azul e fundo transparente. --}}
                                Ver Arquivo
                                {{-- Texto exibido dentro do botão/link. --}}
                            </a>
                        @endif
                        {{-- Fim do @if: se não houver arquivo, simplesmente não aparece botão nenhum. --}}
                    </li>
                    {{-- Fim do item da lista (<li>) referente a uma versão. --}}
                @endforeach
                {{-- Fim do loop foreach: aqui ele já percorreu todas as versões históricas. --}}
            </ul>
            {{-- Fim da lista (<ul>) que contém todas as versões. --}}
        </div>
        {{-- Fim da div com borda, scroll e altura limitada. --}}
    </div>
    {{-- Fim da div com margin-top e título do histórico. --}}
@endif
{{-- Fim do @if: se não houver versões históricas, nada dessa seção é exibido. --}}

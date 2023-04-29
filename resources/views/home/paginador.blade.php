@if (!is_array($Datos))
<tr>
    <td colspan="{{ $cols ?? '10' }}">
        <div class="dataTable-bottom">
            <div class="dataTable-info">
                <p>Mostrando <span>{{($Datos->currentpage()-1)*$Datos->perpage()+1}}</span> a <span>{{$Datos->currentpage()*$Datos->perpage()}}</span> de <span>{{$Datos->total()}}</span> registros</p>
            </div>
            <nav class="dataTable-pagination">
                <ul class="dataTable-pagination-list">
                    {!! $Datos->links() !!}
                </ul>
            </nav>
        </div>
    </td>
</tr>
@endif

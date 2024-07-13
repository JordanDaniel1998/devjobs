<div>
    <!--
        $atrributes -> Permite que puedas recibir los atributos que son enviados a través del componente
        $merge -> Permite que puedas incluir las clases
    -->
    <a
        {{ $attributes->merge(['class' => 'text-xs text-gray-600 hover:text-gray-900']) }}>
        {{ $slot }}
    </a>
</div>

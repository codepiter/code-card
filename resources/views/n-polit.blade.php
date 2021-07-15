@extends('theme.layout.n-master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/dragula/dragula.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
      <p>{{ $message }}</p>
  </div>
@endif

<div class="grid-margin stretch-card">
  <div class="card">
    <div class="card-title px-4 pt-4">
      <h3>Política De Privacidad</h3>
    </div>
    <div class="px-4">
      <hr style="background-color: #262f43; size:2px;">
    </div>
    
    <div class="card-body row">

      <div class="col-sm-8 offset-sm-2">

        <div style="text-align: justify;">
       
       {{-- <h6><strong>- POLÍTICA DE PRIVACIDAD </h6></strong>     <br> --}}
       Fecha de la última revisión: 30/07/2020<br>
       
       A PRACSAC le importa su privacidad. Es por esto que recopilamos y usamos su información personal solo conforme sea necesario para ofrecer nuestros productos, servicios, sitios web y aplicaciones móviles y para comunicarnos con usted al respecto, o según usted lo haya solicitado (colectivamente, nuestros “Servicios”). Su información personal incluye lo siguiente:<br>
       <ul>
         <li>Nombre</li>
         <li>Dirección</li>
         <li>Número telefónico</li>
         <li>Fecha de nacimiento</li>
         <li>Dirección de correo electrónico</li>
         <li>Información de facturación y pago</li>
         <li>Información del candidato (para solicitantes de empleo)</li>
         <li>Otros datos recopilados que lo podrían identificar directa o indirectamente.</li>
       </ul>
       
       
       Nuestra Política de privacidad no solo explica cómo y por qué usamos la información personal que recopilamos, sino también cómo puede acceder, actualizar o por lo demás asumir el control de su información personal.<br>
       Si en algún momento tiene preguntas sobre nuestras prácticas o cualquiera de sus derechos que se detallan a continuación, se puede dirigir a privacy@pracsac.com para comunicarse con nuestro delegado de protección de datos (Data Protection Officer, “DPO”) y nuestro equipo dedicado que brinda asistencia técnica a esta oficina. Controlamos y manejamos activamente esta bandeja de entrada para poder brindarle una experiencia en la que puede confiar con seguridad.<br><br>
       <h6><strong>Qué información recopilamos, cómo lo hacemos y por qué</h6></strong><br>
       Mucha de la que probablemente considere información personal se obtiene directamente de usted cuando:<br>
       
       <ol type="i">
       <li>	crea una cuenta o adquiere cualquiera de nuestros Servicios (p. ej.: información sobre facturación, incluido el nombre, la dirección, el número de tarjeta de crédito, la identificación gubernamental);</li>
       <li>	solicita ayuda a nuestro galardonado equipo de atención al cliente (p. ej.: número de teléfono);</li>
       <li>	completa formularios de contacto o solicita boletines informativos u otra información (p. ej.: correo electrónico); o</li>
       <li>	participa en concursos y encuestas, se postula para un trabajo o participa en actividades que promocionamos y para las que se podría precisar información acerca de usted.</li>
       
       
       <br>
       No obstante, también obtenemos información adicional cuando le entregamos nuestros Servicios para garantizar el funcionamiento necesario y óptimo. Es posible que estos métodos de obtención no sean tan obvios para usted. Es por ello que pensamos en resaltar y explicar un poco más cómo podrían ser (ya que varía periódicamente):<br><br>
       
       <h6><strong>Las cookies y las tecnologías similares</h6></strong><br> en nuestros sitios web y en nuestras aplicaciones móviles nos permiten hacer el seguimiento de su comportamiento de navegación, saber a qué enlaces hace clic, qué productos compró, su tipo de dispositivo y obtener varios datos, incluidos los analíticos, acerca de cómo usa e interactúa con nuestros Servicios. Estas tecnologías recopilan datos automáticamente cuando usa e interactúa con nuestros Servicios, incluidos los metadatos, los archivos de registro, la ID de las cookies/los dispositivos, el tiempo de carga de la página, el tiempo de respuesta del servidor, y la información de la ubicación aproximada para medir el desempeño del sitio web y mejorar nuestros sistemas. Incluye la optimización de la resolución del DNS, el enrutamiento de la red y las configuraciones del servidor. Específicamente, se recopilan las interacciones con las funciones, el contenido y los enlaces (incluidos los de terceros, como los complementos de medios sociales) que están dentro de los Servicios, la dirección del Protocolo de internet (IP), el tipo y las configuraciones del navegador, la fecha y hora en que se usaron los Servicios, la información acerca de la configuración y los complementos del navegador, las preferencias de idioma y los datos de las cookies, la información acerca de los dispositivos para acceder a los Servicios, incluido el tipo de dispositivo, el sistema operativo que se usa, las configuraciones del dispositivo, las ID de la aplicación, los identificadores únicos de dispositivo y datos de error. Todo esto nos permite ofrecerle productos más relevantes, una mejor experiencia en nuestros sitios y aplicaciones móviles, y recopilar, analizar y mejorar el desempeño de nuestros Servicios. También podemos obtener su ubicación (dirección IP) para personalizar nuestros Servicios. <br>
       Se pueden recibir <strong>datos suplementarios</strong> acerca de usted de otras fuentes, inclusive bases de datos públicas o terceros de quienes hayamos adquiridos datos, en cuyo caso podemos combinar estos datos con la información que ya tenemos acerca de usted. Esto nos permite actualizar, ampliar y analizar la exactitud de nuestros registros, valorar las calificaciones de un candidato para un puesto de trabajo, identificar a los nuevos clientes y ofrecerle productos y servicios que le pueden interesar. Si nos proporciona información personal acerca de otras personas, o si otras personas nos proporcionan información acerca de usted, solo utilizaremos dicha información para el propósito específico para el cual se proporcionó.<br><br>
       <h6><strong>Cómo utilizamos la información.</h6></strong><br>
       Creemos firmemente en minimizar los datos que recopilamos y en limitar su uso y finalidad solo (1) para los que se nos ha otorgado permiso, (2) en la medida que sea necesario para entregar los Servicios que compra o interactúa, o (3) en la medida que nos sea requerido o permitido para cumplir con las obligaciones legales u otros fines lícitos:<br><br>
       <h6><strong>Entrega, mejora, actualización y ampliación de nuestros Servicios.</h6></strong><br> Obtenemos información variada con relación a su compra, uso y/o interacciones con nuestros Servicios. Usamos esta información para:<br>
       •	Mejorar y optimizar la operación y el desempeño de nuestros Servicios (nuevamente, incluye nuestros sitios web y aplicaciones móviles).<br>
       •	Diagnosticar problemas e identificar los riesgos de seguridad, errores o mejoras necesarias a los Servicios.<br>
       •	Detectar y evitar fraudes y abusos de nuestros Servicios y sistemas.<br>
       •	Obtener estadísticas globales sobre el uso de los Servicios.<br>
       •	Entender y analizar cómo utiliza nuestros Servicios y cuáles son los productos y servicios más importantes para usted.<br>
       Gran parte de los datos recopilados son datos compilados o estadísticos sobre el modo en que las personas usan nuestros Servicios y no están vinculados con ningún tipo de información personal.<br><br>
       <h6><strong>Compartir con terceros de confianza.</h6></strong><br> Podemos compartir su información personal con empresas afiliadas dentro de nuestra familia corporativa, con terceros con los que nos hemos asociado para que usted pueda integrar los servicios de ellos dentro de nuestros propios Servicios y con terceros de confianza y proveedores de servicio en la medida que sea necesario para que presten servicios en nuestro nombre, como:<br>
       
       <ul>
         <li>	Procesamiento de pagos con tarjeta de crédito</li>
         <li>	Ofrecer publicidad</li>
         <li>	Organización de concursos o encuestas</li>
         <li>	Análisis de desempeño de nuestros Servicios y datos demográficos de los clientes</li>
         <li>	Comunicaciones con usted por correo electrónico o entrega de encuestas</li>
         <li>	Administración de relaciones con el cliente</li>
         <li>	Contratación de asistencia técnica y servicios relacionados. Estos terceros (y cualquier subcontratista que se les permita utilizar) han acordado no compartir, utilizar o retener su información personal para cualquier otro propósito que no sea el necesario para la prestación de los Servicios.</li>
       </ul>
       
       También revelaremos su información a terceros:<br>
       •	en el caso de que vendamos o compremos cualquier negocio o activo (ya sea como resultado de una liquidación, bancarrota o de otro modo), en cuyo caso revelaremos sus datos al posible vendedor o comprador de dicho negocio o activo; o<br>
       •	si vendemos, compramos, fusionamos, somos adquiridos por, o nos asociamos con otras compañías o negocios, o vendemos algunos o todos nuestros activos. En esas transacciones, su información puede estar entre los bienes transferidos.<br><br>
       <h6><strong>Comunicaciones con usted.</h6></strong> <br>Nos podemos comunicar directamente con usted o a través de un tercero proveedor de servicios con referencia a los productos o servicios en los que se registró o nos compró, tales como los necesarios para enviar comunicaciones de transacciones o relacionadas con el servicio. También, si nos autoriza, nos comunicaremos con usted con ofertas para servicios adicionales que creemos que le resultarán de interés, o se permitieron teniendo en cuenta los intereses legítimos No es necesario que nos de su autorización como condición para comprar nuestros bienes o servicios. Estos contactos pueden incluir:<br>
       <ul>
       <li>Correo electrónico</li>
       <li>Mensajes de texto (SMS)</li>
       <li>Llamadas telefónicas</li>
       <li>Aplicaciones de mensajería (p. ej. WhatsApp, entre otras)</li>
       <li>Llamadas telefónicas o mensajes de texto automáticos</li>
       </ul>
       
       También puede actualizar sus preferencias de suscripción para recibir nuestras comunicaciones y/o la de nuestros socios. Para ello, inicie sesión en su cuenta y visite la página “Configuración de cuenta”<br>
       Si recopilamos información sobre usted en relación a una oferta de marcas compartidas, en ese momento se especificará quién recopila la información y a quién pertenece la política de privacidad que se aplica en este caso. Además, se especificarán las opciones de elección que tiene con respecto al uso y/o al uso compartido de su información personal con un socio de marca, así como de la forma en que puede hacer uso de esas opciones. No somos responsables de las prácticas de privacidad o el contenido de dichos sitios de terceros. Lea la política de privacidad de cualquier sitio web que visite.<br>
       Si usa un servicio para importar contactos (por ejemplo, servicios de Email marketing para enviar sus correos electrónicos), solo usaremos los contactos y cualquier otra información personal para el servicio solicitado. Si cree que alguien nos ha proporcionado su información personal y desea solicitar que se elimine de nuestra base de datos, envíenos un correo electrónico a privacy@godaddy.com.<br><br>
       <h6><strong>Transferencia de información personal al extranjero.</h6></strong><br> Si utiliza nuestros Servicios desde un país que no sea el país en el cual están ubicados nuestros servidores, su información personal se podrá transferir a través de fronteras internacionales, lo que solo se hará cuando estén vigentes las cláusulas contractuales estándar adecuadas. También, cuando nos llama o inicia un chat, podemos proporcionarle asistencia técnica desde uno de nuestros lugares internacionales fuera de su país de origen.<br><br>
       <h6><strong>Cumplimiento con solicitudes legales, regulatorias y de aplicación de la ley.</h6></strong><br> Cooperamos con el gobierno y los funcionarios y entidades privadas a cargo de hacer cumplir las leyes, y luchamos para que se cumpla con lo estipulado en la legislación. Divulgaremos su información personal al gobierno o los funcionarios o las entidades privadas a cargo de hacer cumplir las leyes si, a discreción nuestra, consideramos que es necesario o adecuado para responder a las demandas y los procesos legales (por ejemplo, las solicitudes de citaciones) y así proteger nuestra propiedad y nuestros derechos o la propiedad y los derechos de proveedores terceros, proteger la seguridad del público o de cualquier persona, o bien evitar o detener actividades que consideremos ilegales o poco éticas.<br>
       .
       <h6><strong>Cómo aseguramos, almacenamos y retenemos sus datos.</h6></strong><br>
       Seguimos estándares generalmente aceptados para almacenar y proteger la información personal que recopilamos durante la transmisión y una vez recibidos y almacenados, incluida la utilización de cifrado cuando corresponda.<br>
       Conservamos la información personal solo durante el tiempo necesario para proporcionar los Servicios que ha solicitado y en lo sucesivo para diversos fines legales o comerciales. Esto podría incluir períodos de retención:<br>
       •	exigidos por ley, por contrato o por obligaciones similares aplicables a nuestras operaciones comerciales;<br>
       •	para preservar, resolver, defender o hacer cumplir nuestros derechos legales/contractuales; o<br>
       •	necesarios para llevar registros comerciales y económicos que sean adecuados y exactos.<br>
       Si tiene alguna pregunta acerca de la seguridad o retención de su información personal, puede comunicarse con nosotros en privacy@pracsac.com.<br><br>
       <h6><strong>Cómo puede acceder, actualizar o eliminar sus datos.</h6></strong><br>
       Para acceder, ver, actualizar, eliminar o realizar la portabilidad de su información personal con facilidad, o para actualizar sus preferencias de suscripción, inicie sesión en su Cuenta y visite “Configuración de cuenta”. <br>
       Si solicita eliminar su información personal y esos datos son necesarios para los productos o servicios que adquirió, la solicitud se aceptará solo en la medida que ya no sean necesarios para ninguno de los Servicios adquiridos ni requeridos para nuestros fines comerciales legítimos ni para los requisitos legales o contractuales de conservación de registros.<br>
       Si por cualquier motivo no puede acceder a su Configuración de cuenta o a nuestro Centro de confianza, también se podrá comunicar con nosotros por cualquiera de las formas que se describen en la sección “Comunícate con nosotros”.<br><br>
       <h6><strong>Notificaciones ‘No dar seguimiento’.</h6></strong><br>
       Algunos navegadores le permiten notificar automáticamente a los sitios web que visita que no le hagan el seguimiento. Para ello utilice la señal “No dar seguimiento”. No hay consenso entre los participantes de la industria con respecto a qué significa “No dar seguimiento” en este contexto. Al igual que muchos sitios web y servicios en línea, actualmente no modificamos nuestras prácticas cuando recibimos una señal de “No dar seguimiento” del navegador de un visitante. Para obtener más información acerca de la señal de “No dar seguimiento” puede acceder a www.allaboutdnt.com.<br><br>
       <h6><strong>Restricciones de edad.</h6></strong><br>
       Nuestros Servicios están disponibles para la venta solo a personas mayores de 18 años. Nuestros Servicios no están dirigidos a menores de 18 años, ni tampoco es la intención que ellos los consuman ni están diseñados para seducirlos. Comuníquese con nosotros si tiene conocimiento o algún motivo para suponer que un menor de 18 años nos proporcionó información personal.<br><br>
       <h6><strong>No discriminación</h6></strong><br>
       No lo discriminaremos por ejercer ninguno de sus derechos de privacidad. Salvo que esté permitido por las leyes correspondientes, nosotros no:<br>
       
       
       <ul>
         <li>	Le negaremos bienes ni servicios.</li>
         <li>	Le cobraremos precios ni tarifas distintas por bienes o servicios, incluso a través de descuentos u otros beneficios otorgados, ni le impondremos multas.</li>
         <li>	Le proporcionaremos un nivel ni una calidad de bienes o servicios distinta.</li>
         <li>	Le sugeriremos que tal vez obtenga un precio o una tarifa diferentes por bienes o servicios o un nivel o calidad diferente de bienes o servicios.</li>
       </ul>
       
       
       <br>
       <h6><strong>Cambios a esta política.</h6></strong><br>
       Nos reservamos el derecho de modificar esta Política de privacidad en cualquier momento. Si decidimos cambiar nuestra Política de privacidad, publicaremos dichos cambios en esta Política de privacidad y en cualquier otro lugar que consideremos adecuado, para que esté al tanto de qué información recopilamos, cómo la utilizamos y en qué circunstancias la revelamos, si corresponde. Si realizamos cambios sustanciales a esta Política de privacidad, le notificaremos aquí, por correo electrónico o mediante un aviso en su página de inicio, al menos treinta (30) días antes de la implementación de los cambios.<br><br>
       <h6><strong>Autoridad de protección de datos.</h6></strong><br>
       Si reside en el Espacio Económico Europeo (EEE) y considera que debemos conservar su información personal de acuerdo con el Reglamento general de protección de datos (RGPD), puede dirigir las preguntas o quejas a <br><br>
       <h6><strong>Comuníquese con nosotros.</h6></strong><br>
       Si tiene alguna pregunta relacionada con la privacidad, inquietud o queja acerca de nuestra Política de privacidad, nuestras prácticas o nuestros Servicios, comuníquese con nuestra Oficina de DPO por correo electrónico a privacy@pracsac.com. Como alternativa, se puede comunicar con nosotros a través de los siguientes medios:<br>
       
       <ul>
         <li>	Por correo: Attn.: info@pracsac.com</li>
         <li>	Por teléfono: 1 9392013045 </li>
       </ul>
       <br>
       
       <h6><i><strong>Responderemos todos los pedidos, preguntas y preocupaciones dentro de un plazo de 30 (treinta) días.<h6><i><strong><br>
       
       
       
       
       </div>
       </div>

    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/dragula/dragula.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dragula.js') }}"></script>
@endpush
<?php
/**
 * Every UI string on the site, in one file — the single-locale layer. Nothing
 * in partials/ or templates/ contains a visible word; they all read from here,
 * so translating the site is this one file plus content/*.
 *
 * The strings below are Paraguayan Spanish with voseo (PLAN D9), matching the
 * 'py' market. A Swedish site rewrites this file in
 * Swedish and sets 'market' => 'se' in content/site.php; no code changes.
 *
 * Nothing here may name a month, a year, a price or a client: strings must stay
 * true without anyone remembering to edit them.
 */

declare(strict_types=1);

return [

    // Cluster labels, in the order the mega-menu and the services hub use them.
    // A cluster key is referenced by every service record ('cluster' => ...).
    'clusters' => [
        'motos' => 'Motos',
    ],

    // One line under each cluster heading on the services hub. Keyed by cluster id.
    'cluster_leads' => [
        'motos' => 'Modelos y marcas con fuente y fecha de consulta.',
    ],

    'nav' => [
        'home'         => 'Inicio',
        'services'     => 'Servicios',
        'pricing'      => 'Precios',
        'tools'        => 'Herramientas',
        'guides'       => 'Guías',
        'about'        => 'Nosotros',
        'blog'         => 'Blog',
        'contact'      => 'Contacto',
        'privacy'      => 'Privacidad',
        'terms'        => 'Términos',
        'menu'         => 'Menú',
        'close'        => 'Cerrar',
        'open_menu'    => 'Abrir el menú',
        'close_menu'   => 'Cerrar el menú',
        'skip'         => 'Ir al contenido principal',
        'firm'         => 'moto.com.py',
        'all_services' => 'Ver las motos',
    ],

    'cta' => [
        'quote'         => 'Enviar consulta',
        'whatsapp'      => 'WhatsApp',
        'whatsapp_long' => 'Escribir por WhatsApp',
        'consult'       => 'Enviar consulta',
        'contact'       => 'Escribinos',
        'see_included'  => 'Ver el detalle',
        'talk'          => 'Escribinos',
    ],

    // The WhatsApp menu. These are BUTTON LABELS only — the message that
    // actually reaches WhatsApp always comes from content/lead-values.php and
    // names a service, never a generic "consulta gratis".
    'whatsapp' => [
        'menu_title' => '¿Sobre qué querés escribirnos?',
        'menu_note'  => 'Abrimos WhatsApp con el mensaje ya escrito. Podés cambiarlo antes de enviarlo.',
        'other'      => 'Otra consulta',
        'this_page'  => 'Lo que estás viendo',
        'open_menu'  => 'Abrir opciones de WhatsApp',
        'close_menu' => 'Cerrar',
    ],

    'home' => [
        'eyebrow'   => 'Motos en Paraguay',
        'h1_lead'   => 'Todo sobre motos en Paraguay, ',
        'h1_accent' => 'con fuente y fecha.',
        'lead'      => 'Modelos, precios publicados por sus fuentes, guías de compra, reparación '
                     . 'y trámites. Consultá por WhatsApp lo que no encuentres.',

        'services_eyebrow' => 'Motos',
        'services_title'   => 'Marcas y modelos',
        'services_lead'    => 'Encontrá la marca y el modelo que te interesan.',

        'unsure_title' => '¿No sabés qué moto elegir?',
        'unsure_text'  => 'Contanos para qué la vas a usar y te orientamos.',
    ],

    // The panel at the foot of the homepage hero. Labels only: no amounts, no
    // dates, no percentages, no client name — see partials/status-panel.php.
    'panel' => [
        'title' => 'Lo que encontrás acá',
        'badge' => 'Al día',
        'tiles' => [
            ['label' => 'Primer entregable',  'value' => 'Listo'],
            ['label' => 'Segundo entregable', 'value' => 'Listo'],
            ['label' => 'Tercer entregable',  'value' => 'En curso'],
        ],
        'foot'  => 'Próximo paso acordado',
        'note'  => 'Con fuente y fecha de consulta',
    ],

    // The "quiénes somos" band on the homepage. Every line here is a commitment
    // about how the business works, never a claim about size or results — those
    // need the owner's confirmation and belong in content/site.php.
    'about' => [
        'eyebrow' => 'Quiénes somos',
        'title'   => 'Información con fuente, sin inventos.',
        'text'    => 'Cada precio y cada dato técnico dice quién lo publicó y cuándo lo '
                   . 'consultamos. Lo que no tiene fuente, no lo mostramos.',
        // Shown while content/site.php has no credentials[] of its own.
        'credentials' => [
            'Precios publicados por una fuente real, con fecha de consulta',
            'Sin reseñas ni rankings inventados',
            'Te respondemos dentro del siguiente día hábil',
        ],
        'badge_note'     => 'de experiencia',
        'badge_fallback' => 'Equipo propio',
    ],

    // The four-step "cómo trabajamos" block, reused on service pages.
    'process' => [
        'eyebrow' => 'Cómo lo hacemos',
        'title'   => 'De la fuente a la página, sin saltos.',
        'steps'   => [
            [
                'title' => 'Conversación inicial',
                'text'  => 'Buscamos el dato en el aviso del distribuidor o en la página de la marca.',
            ],
            [
                'title' => 'Propuesta por escrito',
                'text'  => 'Anotamos la fuente y la fecha en que lo consultamos.',
            ],
            [
                'title' => 'Puesta en marcha',
                'text'  => 'Lo publicamos tal cual, sin estimar nada por nuestra cuenta.',
            ],
            [
                'title' => 'Seguimiento',
                'text'  => 'Si un dato vence, lo ocultamos hasta volver a verificarlo.',
            ],
        ],
    ],

    // Rendered in place of the testimonials band while content/site.php has
    // none. Sectors, not clients: nothing to verify.
    'industries' => [
        'eyebrow' => 'Tipos',
        'title'   => 'Tipos de moto',
        'lead'    => 'Elegí según para qué la vas a usar.',
        // Each item is either a plain string or ['label' => ..., 'path' => ...]
        // pointing at a segment page in content/segmentos.php.
        'items'   => [],
    ],

    // The band renders only when content/site.php has testimonials.
    'testimonials' => [
        'eyebrow' => 'Casos',
        'title'   => 'Lo que dicen quienes nos escriben',
    ],

    'services_hub' => [
        'eyebrow'      => 'Motos',
        'title'        => 'Todas las motos, en un solo lugar.',
        'lead'         => 'Encontrá la marca y el modelo que te interesan.',
        'unsure_title' => '¿No sabés qué moto elegir?',
        'unsure_text'  => 'Contanos para qué la vas a usar y te orientamos.',
        'unsure_cta'   => 'Escribirnos',
    ],

    'cta_band' => [
        'eyebrow' => 'Consultá',
        'title'   => '¿Buscás una moto? Escribinos.',
        'lead'    => 'Sin costo y sin compromiso. Te respondemos dentro del siguiente día hábil.',
    ],

    'form' => [
        'legend'          => 'Enviar consulta',
        'name'            => 'Nombre',
        'company'         => 'Empresa (opcional)',
        'phone'           => 'WhatsApp o teléfono',
        'phone_hint'      => 'Ej.: 0981 123 456',
        'email'           => 'Correo (opcional)',
        'need'            => '¿Qué necesita?',
        'message'         => 'Contanos brevemente',
        'message_hint'    => 'Qué moto te interesa o qué querés saber…',
        'submit'          => 'Enviar consulta',
        'sending'         => 'Enviando…',
        'privacy_note'    => 'Usamos tus datos solo para responderte. Ver la política de privacidad.',
        'success_title'   => 'Recibimos tu consulta.',
        'success_text'    => 'Te respondemos dentro del siguiente día hábil. Si preferís, escribinos ahora.',
        'error_title'     => 'No pudimos enviar el formulario.',
        'error_text'      => 'Volvé a intentarlo en un momento o escribinos directamente.',
        'error_phone'     => 'Necesitamos un teléfono o WhatsApp válido para responderte.',
        'required'        => 'obligatorio',
        'thanks_next'     => 'Qué sigue',
        'thanks_whatsapp' => 'Si preferís no esperar, escribinos ahora por WhatsApp.',
        'remind_title'    => 'Que te avisemos antes de cada vencimiento',
        'remind_text'     => 'Anotamos tu caso y te escribimos por WhatsApp unos días antes.',
        'remind_phone'    => 'Tu WhatsApp',
        'remind_submit'   => 'Quiero que me recuerden',
        'remind_ok'       => 'Anotado. Te escribimos antes del próximo vencimiento.',
    ],

    // The chip selector in the lead form. Every key here needs a matching entry
    // in content/lead-values.php's 'needs' — verify.sh checks that.
    'needs' => [
        'consulta' => 'Quiero consultar por una moto',
        'otro'     => 'Otra consulta',
    ],

    'contact' => [
        'eyebrow' => 'Contacto',
        'title'   => 'Hablemos de tu moto.',
        'lead'    => 'Escribinos por WhatsApp o dejanos tus datos y te respondemos dentro '
                   . 'del siguiente día hábil.',
        'address' => 'Dirección',
        'hours'   => 'Horario',
        'phone'   => 'Teléfono',
        'email'   => 'Correo',
        'expect'  => 'Qué pasa después',
        'steps'   => [
            'Te respondemos dentro del siguiente día hábil.',
            'Te contamos lo que sabemos, con la fuente de cada dato.',
            'Si hace falta, te indicamos dónde consultar el precio vigente.',
        ],
    ],

    'service' => [
        'includes'     => 'Qué incluye',
        'excludes'     => 'Qué no incluye',
        'we_need'      => 'Qué necesitamos de vos',
        'benefits'     => 'Beneficios',
        'faq'          => 'Preguntas frecuentes',
        'related'      => 'Servicios relacionados',
        'guides'       => 'Guía relacionada',
        'articles'     => 'Artículo relacionado',
        'form_eyebrow' => 'Consulta',
        'form_lead'    => 'Dejanos tus datos y te respondemos, sin costo y sin compromiso.',
        'breadcrumb'   => 'Ruta de navegación',
    ],

    // Segment landing pages (content/segmentos.php).
    'segment' => [
        'traps_title'  => 'Los errores que más cuestan',
        'bundle_title' => 'Lo que te conviene ver',
        'form_eyebrow' => 'Consulta',
        'form_lead'    => 'Contanos qué necesitás y te respondemos.',
    ],

    // Shared microcopy across the tool pages. Calculator-specific labels live in
    // each tool's own PHP/JS; only the repeated strings are here.
    'tools' => [
        'reviewed_prefix' => 'Datos revisados el',
        'orientativo'     => 'Los resultados son orientativos y no reemplazan un cálculo oficial.',
        'calculate'       => 'Calcular',
        'result_title'    => 'Resultado',
        'use_result'      => 'Usar este resultado en el formulario',
        'need_js'         => 'Esta herramienta necesita JavaScript activado en tu navegador.',
        'restart'         => 'Volver a empezar',
    ],

    // Shared microcopy across the guide pages.
    'guide' => [
        'reviewed_prefix'       => 'Revisado el',
        'orientativo'           => 'Es una guía general: para tu caso puntual, confirmalo con nosotros.',
        'delegate_eyebrow'      => 'Consultanos',
        'delegate_title'        => '¿Necesitás ayuda con esto?',
        'delegate_lead'         => 'Te respondemos dentro del siguiente día hábil con lo que sepamos '
                                 . 'de tu caso.',
        'delegate_form_heading' => 'Enviar consulta',
        'related'               => 'Otras guías',
    ],

    // Article chrome (templates/article.php). The long date itself is formatted
    // by the market module's fmt_date_long().
    'article' => [
        'reading_time' => 'min de lectura',
        'updated'      => 'Actualizado el',
        'read_more'    => 'Leer el artículo',
    ],

    // Hub pages: the listings under /servicios/, /blog/, /herramientas/, /guias/.
    'hub' => [
        'empty' => 'Todavía no hay nada publicado en esta sección.',
    ],

    'pricing' => [
        'quote'    => 'A cotizar',
        'per_month' => 'por mes',
        'cta'      => 'Enviar consulta',
        'note'     => 'Consultá el precio vigente con la fuente.',
    ],

    'placeholder' => [
        // Shown on a stub page until the phase that owns it writes the content.
        'notice' => 'Estamos preparando esta página.',
        'action' => 'Mientras tanto, escribinos y te respondemos por WhatsApp.',
    ],

    'error404' => [
        'title' => 'No encontramos esta página',
        'lead'  => 'Puede que el enlace haya cambiado. Estas son las secciones más buscadas.',
    ],

    'footer' => [
        'blurb'   => 'Motos en Paraguay: modelos, precios con fuente, guías y trámites.',
        'rights'  => 'Todos los derechos reservados.',
        'contact' => 'Contacto',
    ],

    /* == F1 == Strings for the foundation's partials and templates. New
       top-level groups only: re-declaring an existing group would replace it. */

    'form_extra' => [
        'cuotas' => 'Me interesa comprarla en cuotas',
    ],

    // partials/fact.php — the wording of D6 is fixed: "Precio publicado por
    // {fuente} — consultado el {d/m/aaaa}".
    'facts' => [
        'price_by' => 'Precio publicado por',
        'accessed' => 'consultado el',
        'sources'  => 'Fuentes',
    ],

    'page' => [
        'toc'     => 'En esta página',
        'faq'     => 'Preguntas frecuentes',
        'updated' => 'Actualizado el',
    ],

    // Labels of catalogue spec keys (content/catalogo.php specs{}). A key not
    // listed here renders as its own name, made readable.
    'specs' => [
        'cc'               => 'Cilindrada',
        'motor'            => 'Motor',
        'potencia'         => 'Potencia',
        'torque'           => 'Torque',
        'transmision'      => 'Transmisión',
        'arranque'         => 'Arranque',
        'alimentacion'     => 'Alimentación',
        'refrigeracion'    => 'Refrigeración',
        'freno_del'        => 'Freno delantero',
        'freno_tras'       => 'Freno trasero',
        'neumatico_del'    => 'Neumático delantero',
        'neumatico_tras'   => 'Neumático trasero',
        'tanque'           => 'Tanque de combustible',
        'peso'             => 'Peso',
        'altura_asiento'   => 'Altura del asiento',
        'consumo'          => 'Consumo',
        'velocidad_max'    => 'Velocidad máxima',
        'velocidad_maxima' => 'Velocidad máxima',
        'autonomia'        => 'Autonomía',
        'bateria'          => 'Batería',
        'carga_util'       => 'Carga útil',
    ],

    'brand' => [
        'h1'          => 'Motos %s en Paraguay',
        'distributor' => 'Distribuidor en Paraguay',
        'models'      => 'Modelos de %s',
        'no_models'   => 'Todavía no cargamos modelos de esta marca.',
    ],

    'model' => [
        'h1'           => '%s: precio en Paraguay y ficha técnica',
        'price'        => 'Precio',
        'no_price'     => 'No encontramos un precio publicado vigente. Consultá el precio actual con el distribuidor.',
        'specs'        => 'Ficha técnica',
        'consumption'  => 'Consumo y velocidad',
        'maintenance'  => 'Mantenimiento',
        'parts'        => 'Repuestos comunes',
        'used'         => 'Qué revisar si es usada',
        'versions'     => 'Versiones',
        'category'     => 'Tipo',
        'years'        => 'Años',
        'brand_link'   => 'Todos los modelos de %s',
        'whatsapp'     => 'Hola, quiero consultar por la %s.',
    ],

    'hubs' => [
        'models' => 'Modelos',
        'guides' => 'Guías relacionadas',
    ],

    'compare' => [
        'h1'        => '%s vs %s',
        'criterion' => 'Cómo comparamos',
        'table'     => 'Ficha lado a lado',
        'spec'      => 'Dato',
        'models'    => 'Ver cada modelo',
    ],

    'quiz' => [
        'title'   => 'Practicá con las preguntas',
        'answer'  => 'Ver la respuesta',
        'correct' => 'Respuesta correcta:',
        'source'  => 'Fuente de las preguntas:',
    ],

    'gracias' => [
        'lead' => 'Te respondemos por WhatsApp o por teléfono. Mientras tanto, podés seguir leyendo.',
        'back' => 'Ver las guías',
    ],
];

import SwaggerUI from 'swagger-ui'
import 'swagger-ui/dist/swagger-ui.css';

const appUrl = import.meta.env.VITE_APP_URL;

SwaggerUI({
    dom_id: '#swagger-api',
    url: appUrl,
    enableCORS: true
});
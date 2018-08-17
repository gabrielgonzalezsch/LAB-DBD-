DROP TRIGGER IF EXISTS transacciones_AI ON transacciones;
DROP FUNCTION IF EXISTS SP_INSERT_TRANSACCIONES;

CREATE OR REPLACE FUNCTION SP_INSERT_TRANSACCIONES() RETURNS TRIGGER AS
$BODY$
	BEGIN
		UPDATE usuarios
		SET fondos_disponibles = fondos_disponibles - NEW.monto
		WHERE usuarios.id_usuario = NEW.id_usuario;
	RETURN NEW;
	END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER transacciones_AI AFTER INSERT ON public.transacciones FOR EACH ROW
	EXECUTE PROCEDURE SP_INSERT_TRANSACCIONES();

/*INSERT INTO public.transacciones(
	id_transaccion, id_usuario, monto, ya_cancelado, hora_compra, numero_cuenta_compra)
	VALUES (4, 9, 1000000, 'Y', '2018-08-16 18:07:27', 124414);*/
